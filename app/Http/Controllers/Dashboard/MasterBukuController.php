<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\Book\AllOfBooksExport;
use App\Http\Controllers\Controller;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MasterBukuController extends Controller
{
    // PROPERTIES
    protected array $rules = [
        "judul" => ["required"],
        "penulis" => ["required"],
        "penerbit" => ["required"],
        "tahun_terbit" => ["required", "digits:4", "numeric", "min:1901"],
        "synopsis" => ["required"],
        "cover" => ["nullable", "image", "file", "max:1240"],
        "genres" => ["required"],
        "stock" => ["required", "digits_between:1,4", "min:1", "max:1000"],
    ];


    // CORES
    public function index()
    {
        $theUser = Auth::user();
        $books = Buku::with(["genres", "wishlists", "reviews", "createdBy"])->get();

        if ($theUser->role == "admin") {
            $viewVariables = [
                "title" => "Buku",
                "books" => $books,
            ];
            return view('pages.dashboard.actors.admin.books.index', $viewVariables);
        };

        if ($theUser->role == "petugas") {
            $viewVariables = [
                "title" => "Buku",
                "books" => $books,
            ];
            return view('pages.dashboard.actors.officer.books.index', $viewVariables);
        };

        return view("errors.403");
    }

    public function create()
    {
        $theUser = Auth::user();
        $genres = Kategori::where("flag_active", "Y")->get();

        if ($theUser->role == "admin") {

            $viewVariables = [
                "title" => "Create Book",
                "genres" => $genres,
            ];
            return view('pages.dashboard.actors.admin.books.create', $viewVariables);
        };

        if ($theUser->role == "petugas") {
            $viewVariables = [
                "title" => "Create Book",
                "genres" => $genres,
            ];
            return view('pages.dashboard.actors.officer.books.create', $viewVariables);
        };

        return view("errors.403");
    }

    public function store(Request $request)
{
    $theUser = Auth::user();
    $this->rules["tahun_terbit"][] = "max:" . now()->year;

    if ($theUser->role == "admin" || $theUser->role == "petugas") {
        $credentials = $request->validate($this->rules);
        $credentials["created_by"] = $theUser->id_user;

        // Generate slug
        $credentials["slug"] = Str::slug($credentials["judul"]);

        if ($request->has("cover")) $credentials["cover"] = $credentials["cover"]->store("book/covers");

        try {
            $book = Buku::create($credentials);
            $book->genres()->sync($credentials["genres"]);
            return redirect("/dashboard/books")->withSuccess("Buku telah dibuat!");
        } catch (\Illuminate\Database\QueryException $e) {
            // Integrity constraint violation, duplicate entry for slug
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withErrors(["slug_error" => "Judul buku sudah digunakan, silakan gunakan judul yang berbeda."]);
            } else {
                return redirect()->back()->withErrors(["general_error" => "Terjadi kesalahan saat menyimpan buku."]);
            }
        }
    };

    return view("errors.403");
}


    public function edit(Buku $book)
    {
        $theUser = Auth::user();
        $book = Buku::with(['genres'])->firstWhere("id_buku", $book->id_buku);
        $genres = Kategori::where("flag_active", "Y")->get();

        if ($theUser->role == "admin") {

            $viewVariables = [
                "title" => $book->judul,
                "book" => $book,
                "genres" => $genres,
            ];
            return view('pages.dashboard.actors.admin.books.edit', $viewVariables);
        };

        if ($theUser->role == "petugas") {
            $viewVariables = [
                "title" => $book->judul,
                "book" => $book,
                "genres" => $genres,
            ];
            return view('pages.dashboard.actors.officer.books.edit', $viewVariables);
        };

        return view("errors.403");
    }

    public function update(Request $request, Buku $book)
{
    $theUser = Auth::user();
    $this->rules["tahun_terbit"][] = "max:" . now()->year;

    if ($theUser->role == "admin" || $theUser->role == "petugas") {
        $credentials = $request->validate($this->rules);
        $credentials["updated_by"] = $theUser->id_user;

        // Update slug if judul changes
        if ($request->has("judul") && $request->judul !== $book->judul) {
            $credentials["slug"] = Str::slug($credentials["judul"]);
        }

        if ($request->has("cover")) {
            if ($book->cover) Storage::delete($book->cover);
            $credentials["cover"] = $credentials["cover"]->store("book/covers");
        };

        try {
            $book->update($credentials);
            if (array_key_exists("genres", $credentials))
                $book->genres()->sync($credentials["genres"]);

            return redirect("/dashboard/books")->withSuccess("Buku telah diperbarui!");
        } catch (\Illuminate\Database\QueryException $e) {
            // Integrity constraint violation, duplicate entry for slug
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withErrors(["slug_error" => "Judul buku sudah digunakan, silakan gunakan judul yang berbeda."]);
            } else {
                return redirect()->back()->withErrors(["general_error" => "Terjadi kesalahan saat memperbarui buku."]);
            }
        }
    };

    return view("errors.403");
}


    public function destroy(Buku $book)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            try {
                if ($book->stock > 0)
                    throw new \Exception("Stok dalam buku ini mencegah penghapusan.");
                if (!Buku::destroy($book->id_buku))
                    throw new \Exception("Terjadi kesalahan saat menghapus buku.");
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("Terjadi kesalahan: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("Buku telah dihapus!");
        };

        if ($theUser->role == "petugas") {
            try {
                if ($book->stock > 0)
                    throw new \Exception("Stok dalam buku ini mencegah penghapusan.");
                if (!Buku::destroy($book->id_buku))
                    throw new \Exception("Terjadi kesalahan saat menghapus buku.");
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("Terjadi kesalahan: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("Buku telah dihapus!");
        };

        return $this->responseJsonMessage("Anda tidak berwenang melakukan tindakan ini!", 422);
    }

    public function export(Request $request)
    {
        $validator = Validator::make($request->all(), $this->exportRules);
        if ($validator->fails()) return view("errors.403");
        $creds = $validator->validate();

        $fileName = now()->format("Y_m_d_His") . "." . strtolower($creds["type"]);
        $writterType = constant("\Maatwebsite\Excel\Excel::" . $creds["type"]);

        $theUser = Auth::user();
        if ($theUser->role == "admin") {
            if ($creds["table"] === "all-of-books") return (new AllOfBooksExport)->download($fileName, $writterType);
        };
        if ($theUser->role == "petugas") {
            if ($creds["table"] === "all-of-books") return (new AllOfBooksExport)->download($fileName, $writterType);
        };

        return view("errors.403");
    }
}

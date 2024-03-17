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
                "title" => "Book",
                "books" => $books,
            ];
            return view('pages.dashboard.actors.admin.books.index', $viewVariables);
        };

        if ($theUser->role == "officer") {
            $viewVariables = [
                "title" => "Book",
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

        if ($theUser->role == "officer") {
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
        $this->rules["year_published"][] = "max:" . now()->year;

        if ($theUser->role == "admin") {
            $credentials = $request->validate($this->rules);
            $credentials["created_by"] = $theUser->id_user;

            if ($request->has("cover")) $credentials["cover"] = $credentials["cover"]->store("book/covers");

            $book = Buku::create($credentials);
            $book->genres()->sync($credentials["genres"]);
            return redirect("/dashboard/books")->withSuccess("The book has been created!");
        };

        if ($theUser->role == "officer") {
            $credentials = $request->validate($this->rules);
            $credentials["created_by"] = $theUser->id_user;

            if ($request->has("cover")) $credentials["cover"] = $credentials["cover"]->store("book/covers");

            $book = Buku::create($credentials);
            $book->genres()->sync($credentials["genres"]);
            return redirect("/dashboard/books")->withSuccess("The book has been created!");
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
                "title" => $book->title,
                "book" => $book,
                "genres" => $genres,
            ];
            return view('pages.dashboard.actors.admin.books.edit', $viewVariables);
        };

        if ($theUser->role == "officer") {
            $viewVariables = [
                "title" => $book->title,
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
        $this->rules["year_published"][] = "max:" . now()->year;

        if ($theUser->role == "admin") {
            $credentials = $request->validate($this->rules);
            $credentials["updated_by"] = $theUser->id_user;

            if ($request->has("cover")) {
                if ($book->cover) Storage::delete($book->cover);
                $credentials["cover"] = $credentials["cover"]->store("book/covers");
            };

            $book->update($credentials);
            if (array_key_exists("genres", $credentials))
                $book->genres()->sync($credentials["genres"]);

            return redirect("/dashboard/books")->withSuccess("The book has been updated!");
        };

        if ($theUser->role == "officer") {
            $credentials = $request->validate($this->rules);
            $credentials["updated_by"] = $theUser->id_user;

            if ($request->has("cover")) {
                if ($book->cover) Storage::delete($book->cover);
                $credentials["cover"] = $credentials["cover"]->store("book/covers");
            };

            $book->update($credentials);
            if (array_key_exists("genres", $credentials))
                $book->genres()->sync($credentials["genres"]);

            return redirect("/dashboard/books")->withSuccess("The book has been updated!");
        };

        return view("errors.403");
    }

    public function destroy(Buku $book)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            try {
                if ($book->stock > 0)
                    throw new \Exception("Stock in this book prevents removing.");
                if (!Buku::destroy($book->id_buku))
                    throw new \Exception("Error removing the book.");
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("The book has been removed!");
        };

        if ($theUser->role == "officer") {
            try {
                if ($book->stock > 0)
                    throw new \Exception("Stock in this book prevents removing.");
                if (!Buku::destroy($book->id_buku))
                    throw new \Exception("Error removing the book.");
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("The book has been removed!");
        };

        return $this->responseJsonMessage("You are unauthorized to do this action.", 422);
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
        if ($theUser->role == "officer") {
            if ($creds["table"] === "all-of-books") return (new AllOfBooksExport)->download($fileName, $writterType);
        };

        return view("errors.403");
    }
}

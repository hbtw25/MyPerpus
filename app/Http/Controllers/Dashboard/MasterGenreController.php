<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\Genre\AllOfGenresExport;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MasterGenreController extends Controller
{
    // PROPERTIES
    protected array $rules = [
        'nama' => ["required"],
        'deskripsi' => ["required"],
    ];


    // CORES
    public function index()
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $genres = Kategori::with(["books", "createdBy"])->get();

            $viewVariables = [
                "title" => "Kategori",
                "genres" => $genres,
            ];
            return view('pages.dashboard.actors.admin.genres.index', $viewVariables);
        };


        if ($theUser->role == "petugas") {
            $genres = Kategori::with(["books", "createdBy"])->get();

            $viewVariables = [
                "title" => "Kategori",
                "genres" => $genres,
            ];
            return view('pages.dashboard.actors.officer.genres.index', $viewVariables);
        };

        return view("errors.403");
    }

    public function create()
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $viewVariables = [
                "title" => "Buat Genre",
            ];
            return view('pages.dashboard.actors.admin.genres.create', $viewVariables);
        };



        if ($theUser->role == "petugas") {
            $viewVariables = [
                "title" => "Buat Genre",
            ];
            return view('pages.dashboard.actors.officer.genres.create', $viewVariables);
        };

        return view("errors.403");
    }

    public function store(Request $request)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $credentials = $request->validate($this->rules);
            $credentials["created_by"] = $theUser->id_user;
            $credentials["slug"] = Str::slug($credentials["nama"]); // Generate slug from nama

            Kategori::create($credentials);
            return redirect("/dashboard/genres")->withSuccess("Genre telah dibuat!");
        };
        if ($theUser->role == "petugas") {
            $credentials = $request->validate($this->rules);
            $credentials["created_by"] = $theUser->id_user;
            $credentials["slug"] = Str::slug($credentials["nama"]); // Generate slug from nama

            Kategori::create($credentials);
            return redirect("/dashboard/genres")->withSuccess("Genre telah dibuat!");
        };



        return view("errors.403");
    }

    public function edit(Kategori $genre)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $viewVariables = [
                "title" => $genre->nama,
                "genre" => $genre,
            ];
            return view('pages.dashboard.actors.admin.genres.edit', $viewVariables);
        };
        if ($theUser->role == "petugas") {
            $viewVariables = [
                "title" => $genre->nama,
                "genre" => $genre,
            ];
            return view('pages.dashboard.actors.officer.genres.edit', $viewVariables);
        };
        return view("errors.403");
    }

    public function update(Request $request, Kategori $genre)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin") {
            $credentials = $request->validate($this->rules);
            $credentials["updated_by"] = $theUser->id_user;
            $credentials["slug"] = Str::slug($credentials["nama"]); // Generate slug from nama

            $genre->update($credentials);
            return redirect("/dashboard/genres")->withSuccess("Genre telah diperbarui!");
        };

        if ($theUser->role == "petugas") {
            $credentials = $request->validate($this->rules);
            $credentials["updated_by"] = $theUser->id_user;
            $credentials["slug"] = Str::slug($credentials["nama"]); // Generate slug from nama

            $genre->update($credentials);
            return redirect("/dashboard/genres")->withSuccess("Genre telah diperbarui!");
        };

        return view("errors.403");
    }

    public function destroy(Kategori $genre)
    {
        $theUser = Auth::user();
        $genre = Kategori::with(["books"])->firstWhere("id_kategori", $genre->id_kategori);

        if ($theUser->role == "admin") {
            try {
                if ($genre->books->count() > 0)
                    throw new \Exception("Buku dalam genre ini mencegah non-aktivasi atau dihapuskan!.");
                if (!$genre->update(["updated_by" => $theUser->id_user, "flag_active" => "N", "deleted_at" => null]))
                    throw new \Exception("Error menonaktifkan genre.");
                    if (!Kategori::destroy($genre->id_kategori))
                    throw new \Exception("Error menghapus kategori.");
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("Terjadi kesalahan: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("Genre telah dihapus!");
        };


        if ($theUser->role == "petugas") {
            try {
                if ($genre->books->count() > 0)
                    throw new \Exception("Buku dalam genre ini mencegah non-aktivasi atau dihapuskan!.");
                if (!$genre->update(["updated_by" => $theUser->id_user, "flag_active" => "N", "deleted_at" => null]))
                    throw new \Exception("Error menonaktifkan genre.");
                    if (!Kategori::destroy($genre->id_kategori))
                    throw new \Exception("Error menghapus kategori.");
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("Terjadi kesalahan: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("Genre telah dihapus!");
        };

        return $this->responseJsonMessage("Anda tidak diotorisasi untuk melakukan tindakan ini.", 422);



    }




    public function activate(Kategori $genre)
    {
        $theUser = Auth::user();

        if ($theUser->role == "admin" || $theUser->role == "petugas") {
            try {
                if (!$genre->update(["updated_by" => $theUser->id_user, "flag_active" => "Y", "deleted_at" => null]))
                    throw new \Exception("Error mengaktifkan genre.");
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("Terjadi kesalahan: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("Genre telah diaktifkan!");
        };


        return $this->responseJsonMessage("Anda tidak diotorisasi untuk melakukan tindakan ini.", 422);
    }

    public function export(Request $request)
{
    $validator = Validator::make($request->all(), $this->exportRules);
    if ($validator->fails()) return view("errors.403");
    $creds = $validator->validate();

    $fileName = now()->format("Y_m_d_His") . "." . strtolower($creds["type"]);
    $writterType = constant("\Maatwebsite\Excel\Excel::" . $creds["type"]);

    $theUser = Auth::user();
    if ($theUser->role == "admin" || $theUser->role == "petugas") {
        if ($creds["table"] === "all-of-genres") return (new AllOfGenresExport)->download($fileName, $writterType);
    };

    return view("errors.403");
}

}

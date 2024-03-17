<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\Book\Receipt\AllOfReceiptsExport;
use App\Exports\Book\Receipt\YourReceiptsExport;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    // PROPERTIES
    protected array $rules = [
        "id_user" => ["required", "exists:users,id_user"],
        "id_buku" => ["required", "exists:bukus,id_buku"],
        "jumlah" => ["required", "numeric", "integer", "min:1", "max:9"],
        "tanggal_peminjaman" => ["required", "date"],
        "tanggal_pengembalian" => ["required", "date"],
    ];


    // CORES
    public function index()
    {
        $theUser = Auth::user();
        $receipts = Peminjaman::with(["book", "user", "createdBy"])->latest()->get()->sortByDesc("created_at");

        // Admin
        if ($theUser->role === "admin") {
            $viewVariables = [
                "title" => "Receipt",
                "receipts" => $receipts,
            ];
            return view("pages.dashboard.actors.admin.receipts.index", $viewVariables);
        }

        // Officer
        if ($theUser->role === "petugas") {
            $viewVariables = [
                "title" => "Receipt",
                "receipts" => $receipts,
            ];
            return view("pages.dashboard.actors.officer.receipts.index", $viewVariables);
        }

        // Reader
        if ($theUser->role === "peminjam") {
            $viewVariables = [
                "title" => "Receipt",
                "receipts" => $receipts->where("id_user", $theUser->id_user),
            ];
            return view("pages.dashboard.actors.reader.receipts.index", $viewVariables);
        }

        return view("errors.403");
    }

    public function create()
    {
        $theUser = Auth::user();
        $users = User::where("role", "peminjam")->where("flag_active", "Y")->get();
        $books = Buku::all();

        // Admin
        if ($theUser->role === "admin") {
            $viewVariables = [
                "title" => "Create Receipt",
                "users" => $users,
                "books" => $books,
            ];
            return view("pages.dashboard.actors.admin.receipts.create", $viewVariables);
        }

        // Officer
        if ($theUser->role === "petugas") {
            $viewVariables = [
                "title" => "Create Receipt",
                "users" => $users,
                "books" => $books,
            ];
            return view("pages.dashboard.actors.officer.receipts.create", $viewVariables);
        }





         // peminjam
         if ($theUser->role === "peminjam") {
            $viewVariables = [
                "title" => "Create Receipt",
                "users" => $users->where("id_user", $theUser->id_user),
                "books" => $books,
            ];
            return view("pages.dashboard.actors.reader.receipts.create", $viewVariables);


        }

        return view("errors.403");
    }

    public function store(Request $request)
    {
        $theUser = Auth::user();
        // Admin
        if ($theUser->role === "admin") {
            $credentials = $request->validate($this->rules);
            $credentials["created_by"] = Auth::user()->id_user;
            $book = Buku::firstWhere("id_buku", $credentials["id_buku"]);
            // Check stock
            if ($book->stock < $credentials["jumlah"])
                return redirect("/dashboard/receipts")->withErrors("Stock is not enough!");

            Peminjaman::create($credentials);

            return redirect("/dashboard/receipts")->withSuccess("Receipt created successfully!");
        }

        // Officer
        if ($theUser->role === "petugas") {
            $credentials = $request->validate($this->rules);
            $credentials["created_by"] = Auth::user()->id_user;
            $book = Buku::firstWhere("id_buku", $credentials["id_buku"]);
            // Check stock
            if ($book->stock < $credentials["jumlah"])
                return redirect("/dashboard/receipts")->withErrors("Stock is not enough!");

            Peminjaman::create($credentials);

            return redirect("/dashboard/receipts")->withSuccess("Receipt created successfully!");
        }

        if ($theUser->role === "peminjam") {
            $credentials = $request->validate($this->rules);
            $credentials["created_by"] = Auth::user()->id_user;
            $book = Buku::firstWhere("id_buku", $credentials["id_buku"]);
            // Check stock
            if ($book->stock < $credentials["jumlah"])
                return redirect("/dashboard/receipts")->withErrors("Stock is not enough!");

            Peminjaman::create($credentials);

            return redirect("/dashboard/receipts")->withSuccess("Receipt created successfully!");
        }

        return view("errors.403");
    }

    public function returned(Peminjaman $receipt)
    {
        $theUser = Auth::user();
        $receipt = Peminjaman::with(["user"])->firstWhere("id_peminjaman", $receipt->id_peminjaman);

        try {
            $fields = [
                "tanggal_dikembalikan" => now(),
                "status" => "dikembalikan",
                "updated_by" => $theUser->id_user,
            ];
            $receipt->update($fields);
            if ($receipt->user->flag_active === "N") $receipt->user->update(["flag_active" => "Y"]);
        } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => "An error occured: " . $e->getMessage(),
            ], 500);
        }

        return response()->json([
            "message" => "The receipt has been updated. Book returned.",
        ], 200);
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
            if ($creds["table"] === "all-of-receipts") return (new AllOfReceiptsExport)->download($fileName, $writterType);
        };
        if ($theUser->role == "petugas") {
            if ($creds["table"] === "all-of-receipts") return (new AllOfReceiptsExport)->download($fileName, $writterType);
        };
        if ($theUser->role == "reader") {
            if ($creds["table"] === "your-receipts") return (new YourReceiptsExport)->forIdUser($theUser->id_user)->download($fileName, $writterType);
        };

        return view("errors.403");
    }

}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Koleksi_pribadi;

use App\Models\Kategori;
use App\Models\Peminjaman;


use App\Models\Ulasan_buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // CORES
    public function index()
    {
        $theUser = Auth::user();

        $greeting = "";
        $time = now()->hour;
        if ($time >= 6 && $time <= 11) $greeting = "Selamat Pagi";
        else if ($time >= 12 && $time <= 14) $greeting = "Selamat Siang";
        else if ($time >= 15 && $time <= 18) $greeting = "Selamat Sore";
        else $greeting = "Selamat Malam";

        // Admin
        if ($theUser->role === "admin") {
            $usersCount = User::all()->count();
            $inactiveUsersCount = User::all()->where('flag_active', "N")->count();
            $officersCount = User::all()->where('role', "petugas")->count();
            $readersCount = User::all()->where('role', "peminjam")->count();
            $receiptsCount = Peminjaman::all()->count();
            $reviewsCount = Ulasan_buku::all()->count();
            $wishlistsCount = Koleksi_pribadi::all()->count();
            $genresCount = Kategori::all()->count();

            $receipts = Peminjaman::with(["user"])->latest()->limit(5)->get();
            $reviews = Ulasan_buku::with(["user"])->latest()->paginate(3);

            $viewVariables = [
                "title" => "Dashboard",
                "greeting" => $greeting,
                "usersCount" => $usersCount,
                "inactiveUsersCount" => $inactiveUsersCount,
                "officersCount" => $officersCount,
                "readersCount" => $readersCount,
                "receiptsCount" => $receiptsCount,
                "reviewsCount" => $reviewsCount,
                "wishlistsCount" => $wishlistsCount,
                "genresCount" => $genresCount,
                "receipts" => $receipts,
                "reviews" => $reviews,
            ];
            return view("pages.dashboard.actors.admin.index", $viewVariables);
        }

        // Officer
        if ($theUser->role === "petugas") {
            $officersCount = User::all()->where('role', "petugas")->count();
            $readersCount = User::all()->where('role', "peminjam")->count();
            $receiptsCount = Peminjaman::all()->count();
            $reviewsCount = Ulasan_buku::all()->count();

            $receipts = Peminjaman::with(["user"])->latest()->limit(3)->get();
            $reviews = Ulasan_buku::with(["user"])->latest()->paginate(3);

            $viewVariables = [
                "title" => "Dashboard",
                "greeting" => $greeting,
                "officersCount" => $officersCount,
                "readersCount" => $readersCount,
                "receiptsCount" => $receiptsCount,
                "reviewsCount" => $reviewsCount,
                "receipts" => $receipts,
                "reviews" => $reviews,
            ];
            return view("pages.dashboard.actors.officer.index", $viewVariables);
        }

        // Reader
        if ($theUser->role === "peminjam") {
            $receiptsCount = Peminjaman::where("id_user", $theUser->id_user)->count();
            $reviewsCount = Ulasan_buku::where("id_user", $theUser->id_user)->count();
            $wishlistsCount = Koleksi_pribadi::where("id_user", $theUser->id_user)->count();

            $receipts = Peminjaman::with(["user"])->where("id_user", $theUser->id_user)->latest()->limit(3)->get();
            $reviews = Ulasan_buku::with(["user"])->where('id_user', $theUser->id_user)->latest()->paginate(3);

            $viewVariables = [
                "title" => "Dashboard",
                "greeting" => $greeting,
                "receiptsCount" => $receiptsCount,
                "reviewsCount" => $reviewsCount,
                "wishlistsCount" => $wishlistsCount,
                "receipts" => $receipts,
                "reviews" => $reviews,
            ];
            return view("pages.dashboard.actors.reader.index", $viewVariables);
        }
    }
}

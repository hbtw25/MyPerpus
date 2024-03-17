<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Ulasan_buku;


class HomeController extends Controller
{
    // CORES
    public function index()
    {
        $reviews = Ulasan_buku::with(["user", "book"])->latest()->limit(3)->get();

        $viewVariables = [
            "title" => "Home",
            "reviews" => $reviews,
        ];
        return view('pages.landing-page.home.index', $viewVariables);
    }
}

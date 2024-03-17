<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Kategori;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    protected const REQUEST = ["search"];

    public function index(Request $request)
    {
        $data = $request->only(self::REQUEST);
        $genres = Kategori::with(["books"])->filter($data)->paginate(4)->withQueryString();

        $viewVariables = [
            "title" => "Genre",
            "genres" => $genres,
        ];
        return view('pages.landing-page.genres.index', $viewVariables);
    }
}

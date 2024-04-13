<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Koleksi_pribadi;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
     // PROPERTIES
     protected const REQUEST = ["search", "penulis", "judul", "tahun_terbit", "penerbit", "genre"];


     // CORES
     public function index(Request $request)
     {
         $data = $request->only(self::REQUEST);
         $books = Buku::with(["genres", "wishlists"])->filter($data)->paginate(3)->withQueryString();

         $viewVariables = [
             "title" => "Book",
             "books" => $books,
         ];
         return view('pages.landing-page.books.index', $viewVariables);
     }

     public function show(Buku $book)
     {
         $book = Buku::with(['reviews.user'])->firstWhere("id_buku", $book->id_buku);
         $reviews = $book->reviews()->orderByDesc("created_at")->paginate(3);

         $viewVariables = [
             "title" => $book->judul,
             "book" => $book,
             "reviews" => $reviews,
         ];
         return view('pages.landing-page.books.show', $viewVariables);
     }

     public function wishlist(Buku $book, Request $request)
     {
         $theUser = Auth::user();

         $credentials = $request->validate(["id_koleksi" => "nullable"]);
         $message = '';
         if (array_key_exists("id_koleksi", $credentials)) {
             $wishlist = Koleksi_pribadi::firstWhere("id_koleksi", $credentials["id_koleksi"]);
             Koleksi_pribadi::destroy($wishlist->id_koleksi);
             $message = "Book has been removed from your wishlist!";
         } else {
             $fields = [
                 "id_user" => $theUser->id_user,
                 "id_buku" => $book->id_buku,
             ];
             Koleksi_pribadi::create($fields);
             $message = "Book has been added to your wishlist!";
         }

         return back()->withSuccess($message);
     }

     public function reviewed(Buku $book, Request $request)
     {
         $user = Auth::user();


         // Check if the user has already reviewed the book
         if ($book->reviews()->where('id_user', $user->id_user)->exists()) {
             return redirect("/buku/{$book->slug}")->withError("You have already reviewed this book!");
         }

         $credentials = $request->validate([
             "body" => ["required"],
             "rating" => ["required", "numeric", "integer", "min:1", "max:5"],
             "photo" => ["nullable", "image", "file", "max:1024"],
         ]);
         $credentials["id_user"] = $user->id_user;

         if ($request->has("photo")) $credentials["photo"] = $credentials["photo"]->store("book-reviews");

         $book->reviews()->create($credentials);

         return redirect("/buku/{$book->slug}")->withSuccess("Your review has been posted!");
     }

}

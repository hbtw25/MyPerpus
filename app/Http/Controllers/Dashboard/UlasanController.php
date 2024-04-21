<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\Book\Review\AllOfReviewsExport;
use App\Exports\Book\Review\YourReviewsExport;
use App\Http\Controllers\Controller;
use App\Models\Ulasan_buku;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UlasanController extends Controller
{
    // PROPERTIES
    protected array $rules = [
        "body" => ["required"],
        "rating" => ["required", "numeric", "integer", "min:1", "max:5"],
        "photo" => ["nullable", "image", "file", "max:1024"],
    ];


    // COReS
    public function index()
    {
        $theUser = Auth::user();

        if ($theUser->role === "admin") {
            $reviews = Ulasan_buku::with(["user", "book"])->get();
            $yourReviews = Ulasan_buku::with(["user", "book"])->where("id_user", $theUser->id_user)->get();

            $viewVariables = [
                "title" => "Review",
                "reviews" => $reviews,
                "yourReviews" => $yourReviews,
            ];
            return view("pages.dashboard.actors.admin.reviews.index", $viewVariables);
        }

        if ($theUser->role === "petugas") {
            $reviews = Ulasan_buku::with(["user", "book"])->get();
            $yourReviews = Ulasan_buku::with(["user", "book"])->where("id_user", $theUser->id_user)->get();

            $viewVariables = [
                "title" => "Review",
                "reviews" => $reviews,
                "yourReviews" => $yourReviews,
            ];
            return view("pages.dashboard.actors.officer.reviews.index", $viewVariables);
        }

        if ($theUser->role === "peminjam") {
            $yourReviews = Ulasan_buku::with(["user", "book"])->where("id_user", $theUser->id_user)->get();

            $viewVariables = [
                "title" => "Review",
                "yourReviews" => $yourReviews,
            ];
            return view("pages.dashboard.actors.reader.reviews.index", $viewVariables);
        }

        return view("errors.403");
    }

    public function edit(Ulasan_buku $review)
    {
        $theUser = Auth::user();

        if ($review->id_user === $theUser->id_user) {
            $viewVariables = [
                "title" => "Review",
                "review" => $review,
            ];
            return view("pages.dashboard.actors.custom.reviews.edit", $viewVariables);
        }

        return view("errors.403");
    }

    public function update(Request $request, Ulasan_buku $review)
    {
        $theUser = Auth::user();
        $review = Ulasan_buku::with(["user", "book"])->firstWhere("id_ulasan", $review->id_ulasan);

        if ($review->id_user === $theUser->id_user) {
            $credentials = $request->validate($this->rules);

            if ($request->has("photo")) {
                Storage::delete($credentials["photo"]);
                $credentials["photo"] = $credentials["photo"]->store("book/reviews");
            }

            $review->update($credentials);
            return redirect("buku/" . $review->book->slug)->withSuccess("Your review has been updated!");
        }

        return view("errors.403");
    }

    public function destroy(Ulasan_buku $review)
    {
        $theUser = Auth::user();

        try {
            if ($review->id_user !== $theUser->id_user) throw new \Exception("You are not allowed to remove this review.");
            if (!Ulasan_buku::destroy($review->id_ulasan)) throw new \Exception("Error removing review.");
        } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
            return $this->responseJsonMessage($e->getMessage(), 500);
        } catch (\Throwable $e) {
            return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
        }

        return $this->responseJsonMessage("Your review has been removed.");
    }

    public function destroyYourReviewPhoto(Ulasan_buku $review)
    {
        $theUser = Auth::user();

        try {
            if ($review->id_user !== $theUser->id_user) throw new \Exception("You are not allowed to remove this review's photo.");
            if (!Storage::delete($review->photo)) throw new \Exception("Error removing the review's photo.");
            if (!$review->update(["photo" => null])) throw new \Exception("Error removing the review's photo.");
        } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
            return $this->responseJsonMessage($e->getMessage(), 500);
        } catch (\Exception $e) {
            return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
        }

        return $this->responseJsonMessage("The review's photo has been removed!");
    }

    public function export(Request $request)
    {
        $theUser = Auth::user();

        $validator = Validator::make($request->all(), $this->exportRules);
        if ($validator->fails()) return view("errors.403");
        $creds = $validator->validate();

        $fileName = now()->format("Y_m_d_His") . "." . strtolower($creds["type"]);
        $writterType = constant("\Maatwebsite\Excel\Excel::" . $creds["type"]);

        $theUser = Auth::user();
        if ($theUser->role == "admin") {
            if ($creds["table"] === "all-of-reviews") return (new AllOfReviewsExport)->download($fileName, $writterType);
        };
        if ($theUser->role == "petugas") {
            if ($creds["table"] === "all-of-reviews") return (new AllOfReviewsExport)->download($fileName, $writterType);
        };
        if ($creds["table"] === "your-reviews") return (new YourReviewsExport)->forIdUser($theUser->id_user)->download($fileName, $writterType);

        return view("errors.403");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected array $exportRules = [
        "table" => ["required"],
        "type" => ["required", "in:XLSX,CSV,HTML,MPDF"],
    ];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $user = Auth::user();

                if ($user->flag_active === "N") {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect('/')->withError("Your account has been banned!");
                };
            }

            return $next($request);
        });
    }

    public function responseJsonMessage($message, $status = 200)
    {
        return response()->json([
            "message" => $message,
        ], $status);
    }
}

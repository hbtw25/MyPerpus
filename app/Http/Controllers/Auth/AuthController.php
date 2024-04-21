<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert as Alert;
class AuthController extends Controller
{
    // PROPERTIES
    protected array $rules = [
        "username" => ["required"],
        "password" => ["required"],
    ];


    // CORES
    public function index()
    {
        $viewVariables = [
            "title" => "Login",
        ];
        return view('pages.auth.login.index', $viewVariables);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate($this->rules);
        $user = User::firstWhere("username", $credentials["username"]);

        if ($user)
            if ($user->flag_active === "N" or $user->deleted_at) return back()->with("error", "Akun Anda telah diblokir!");

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Hore!', 'Login berhasil!');
            return redirect()->intended('/dashboard');
        }

        return back()->with("error", "Kredensial yang diberikan tidak cocok dengan catatan kami.");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->withSuccess("Berhasil keluar!");
    }
}

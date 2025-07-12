<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login()
    {
        $credentials = \request()->only([
            'email', 'password'
        ]);

        if (Auth::attempt($credentials)) {
            \request()->session()->regenerate();
            return to_route('dashboard');
        }

        return redirect('/login')->with([
            'message' => 'Usuário e senha inválidos'
        ]);

    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('auth.login');
    }

    public function login(): void
    {
        dd(
            \request()->all()
        );
    }
}

<?php

namespace App\Http\Controllers\Auth\Controllers\Auth;

use App\Http\Controllers\Auth\Controllers\Controller;
use App\Http\Requests\MakeLoginRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class LoginController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('auth.login');
    }

    public function dash(): View|Factory|Application
    {
        return view('dashboard');
    }

    public function login(MakeLoginRequest $request)
    {
        if ($request->attempt()) {
            return to_route('dashboard');
        }

        return back()->with([
            'message' => 'User invalid'
        ]);
    }
}

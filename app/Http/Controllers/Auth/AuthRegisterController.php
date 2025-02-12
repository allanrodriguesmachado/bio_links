<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Foundation\Application;

class AuthRegisterController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {

        if ($request->tryToRegister()) {
            return to_route('dashboard');
        }

        return back()->with([
           'message' => 'Ops deu ruim'
        ]);
    }
}

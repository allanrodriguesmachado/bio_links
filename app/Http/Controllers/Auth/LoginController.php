<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request)
    {
        $email = request()->email;

        if ($user = User::query()->where('email', '=', $email)->first()) {
            if(Hash::check(request()->password, $user->password)) {
                return to_route('dashboard');
            }
        }

        return back()->with([
            'message' => 'User invalid'
        ]);
    }
}

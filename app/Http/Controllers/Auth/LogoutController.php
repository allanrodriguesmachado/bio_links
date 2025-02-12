<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(): \Illuminate\Http\RedirectResponse
    {
        auth()->logout();
        session()->invalidate();
        return to_route('login');
    }
}

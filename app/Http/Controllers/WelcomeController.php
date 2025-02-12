<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function __invoke(Request $request): View|Factory|Application
    {
        return view('dashboard');
    }
}

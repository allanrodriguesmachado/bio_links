<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/dashboard',[LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('/logout', [
    LoginController::class, 'logout'
])->name('logout');

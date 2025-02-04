<?php

use App\Http\Controllers\Auth\Controllers\Auth\AuthRegisterController;
use App\Http\Controllers\Auth\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [AuthRegisterController::class, 'index'])->name('register');
Route::post('/register', [AuthRegisterController::class, 'register']);

Route::get('/dashboard', [
    LoginController::class, 'dash'
])->name('dashboard');

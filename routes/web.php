<?php

use App\Http\Controllers\Auth\AuthRegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [AuthRegisterController::class, 'index'])->name('register');
    Route::post('/register', [AuthRegisterController::class, 'register']);
});

Route::get('/logout', \App\Http\Controllers\Auth\LogoutController::class)->middleware('auth')->name('logout');
Route::get('/dashboard', fn() => 'Dashboard:: ' . auth()->id())->middleware('auth')->name('dashboard');

//Route::get('/dashboard', [
//    LoginController::class, 'dash'
//])->name('dashboard' . auth()->id());

<?php

use App\Http\Controllers\Auth\AuthRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\DashboardController;
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

Route::middleware('auth')->group(function () {
    Route::get('/logout', LogoutController::class)->name('logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/link/{link}/edit', [LinkController::class, 'edit'])->name('link.edit');
    Route::put('/link/{link}/edit', [LinkController::class, 'update'])->name('link.update');
    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links/create', [LinkController::class, 'store']);
});


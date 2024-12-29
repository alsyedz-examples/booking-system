<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'loginForm'])->name('login.form');

    Route::post('login', [LoginController::class, 'attemptLogin'])->name('login.attempt');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'attemptLogout'])->name('logout.attempt');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');

    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
});

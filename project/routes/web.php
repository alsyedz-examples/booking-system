<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');

Route::prefix('/contact-us')->group(function () {
    Route::get('', [ContactUsController::class, 'index'])->name('contact-us');

    Route::post('', [ContactUsController::class, 'store'])->name('contact-us.store');
});

require __DIR__.'/auth.php';

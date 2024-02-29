<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('backend/dashboard', function () {
    return view('backend.dashboard');
})->middleware('auth');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackEnd\BannerController;
use App\Http\Controllers\BackEnd\DashboardController;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('backend/dashboard/', [DashboardController::class, 'index'])->name('backend.dashboard')->middleware('auth');

Route::prefix('backend/dashboard/')->name('backend.dashboard.')->middleware('auth')->group(function () {
    Route::resource('banner', BannerController::class);
});
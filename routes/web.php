<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackEnd\AboutController;
use App\Http\Controllers\BackEnd\SkillController;
use App\Http\Controllers\BackEnd\BannerController;
use App\Http\Controllers\BackEnd\DashboardController;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('backend/dashboard/', [DashboardController::class, 'index'])->name('backend.dashboard')->middleware('auth');

Route::prefix('backend/dashboard/')->name('backend.dashboard.')->middleware('auth')->group(function () {
    // Banner Route
    Route::resource('banner', BannerController::class);

    // Social Icons Route
    Route::get('social-links', [DashboardController::class, 'socialLinkIndex'])->name('socialLink.index');
    Route::post('social-links', [DashboardController::class, 'socialLinkStore'])->name('socialLink.store');

    // About Route
    Route::resource('about', AboutController::class);
    // Skills Route
    Route::resource('skill', SkillController::class);
});
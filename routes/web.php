<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

$domain = app()->environment('production') ? 'mtex.dev' : null;

Route::domain($domain)->group(function () {
    
    Route::get('/', [PageController::class, 'home'])->name('pages.home');
    Route::get('/lander', [PageController::class, 'lander'])->name('pages.lander');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [PageController::class, 'dashboard'])->name('pages.dashboard');
    });

});
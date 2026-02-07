<?php

use App\Services\Go\Http\Controllers\BaseController;
use App\Services\Go\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::name('go.')->group(function () {
    //Route::get('/{slug}', RedirectController::class)->name('redirect');

    Route::controller(BaseController::class)->group(function () {
        Route::get('/', 'home')->name('home');
        Route::get('/lander', 'lander')->name('lander');

        Route::middleware(['auth'])->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
        });
    });
});
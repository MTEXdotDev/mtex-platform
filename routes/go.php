<?php

use App\Services\Go\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/{slug}', RedirectController::class)->name('go.redirect');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function() {
        return "MTEX-Go Dashboard";
    });
});
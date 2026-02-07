<?php

use App\Http\Controllers\Settings\AccountController;
use Illuminate\Support\Facades\Route;

Route::controller(AccountController::class)->group(function () {
    Route::get('/', 'index')->name('settings.index');
    
    Route::patch('/profile', 'update')->name('settings.update');
    
    Route::delete('/', 'destroy')->name('settings.destroy');
});
<?php

use App\Http\Controllers\Settings\AccountController;
use App\Http\Controllers\Settings\ActivityController;
use App\Http\Controllers\Settings\ApiTokenController;
use App\Http\Controllers\Settings\OrganizationController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\Settings\SecurityController;
use Illuminate\Support\Facades\Route;

Route::get('/index', [ProfileController::class, 'edit'])->name('settings.index');
Route::get('/', [ProfileController::class, 'edit'])->name('settings.profile');
Route::patch('/profile', [ProfileController::class, 'update'])->name('settings.profile.update');

Route::get('/security', [SecurityController::class, 'index'])->name('settings.security');
Route::put('/password', [SecurityController::class, 'updatePassword'])->name('settings.password.update');
Route::delete('/sessions/{session_id}', [SecurityController::class, 'destroySession'])->name('settings.sessions.destroy');

Route::get('/api-tokens', [ApiTokenController::class, 'index'])->name('settings.api');
Route::post('/api-tokens', [ApiTokenController::class, 'store'])->name('settings.api.store');
Route::delete('/api-tokens/{id}', [ApiTokenController::class, 'destroy'])->name('settings.api.destroy');

Route::get('/organizations', [OrganizationController::class, 'index'])->name('settings.organizations');
Route::delete('/organizations/{organization}', [OrganizationController::class, 'leave'])->name('settings.organizations.leave');

Route::get('/activity', [ActivityController::class, 'index'])->name('settings.activity');

Route::get('/account', [AccountController::class, 'edit'])->name('settings.account');
Route::delete('/account', [AccountController::class, 'destroy'])->name('settings.account.destroy');
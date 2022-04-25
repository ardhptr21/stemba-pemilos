<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => to_route('auth.voter_login'));

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::get('/voter_login', 'voter_login')->name('auth.voter_login');
    Route::get('/admin_login', 'admin_login')->name('auth.admin_login');
});

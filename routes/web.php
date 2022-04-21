<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => to_route('auth.voter_login'));

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::get('/voter_login', 'voter_login')->name('auth.voter_login');
    Route::post('/voter_login', 'voter_login_logged')->name('auth.voter_login_loged');
});

Route::controller(VoteController::class)->prefix('vote')->group(function () {
    Route::get('/', 'index')->name('vote.index');
});

Route::controller(CandidateController::class)->prefix('candidates')->group(function () {
    Route::get('/{slug}', 'show')->name('candidates.show');
});

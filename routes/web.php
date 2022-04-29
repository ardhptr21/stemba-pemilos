<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => to_route('auth.voter_login'));

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::get('/voter_login', 'voter_login')->name('auth.voter_login');
    Route::post('/voter_login', 'voter_login_logged')->name('auth.voter_login_loged');
    Route::get('/admin_login', 'admin_login')->name('auth.admin_login');
});

Route::controller(VoteController::class)->prefix('vote')->group(function () {
    Route::get('/', 'index')->name('vote.index');
    Route::get('/thanks', 'thanks')->name('vote.thanks');
    Route::post('/{candidate:slug}', 'submit')->name('vote.submit');
});

Route::controller(CandidateController::class)->prefix('candidates')->group(function () {
    Route::get('/{candidate:slug}', 'show')->name('candidates.show');
    Route::post('/', 'store')->name('candidates.store');
});

Route::controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('/', 'index')->name('admin.index');
    Route::get('/candidate', 'candidate')->name('admin.candidate');
    Route::get('/recapitulation', 'recapitulation')->name('admin.recapitulation');
});

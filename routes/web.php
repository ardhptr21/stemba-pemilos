<?php

use Illuminate\Support\Facades\URL;

if (env('APP_ENV') === 'production' && !env('APP_DEBUG')) {
    URL::forceScheme('https');
}

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => to_route('auth.voter_login'));

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    // for voter
    Route::get('/voter_login', 'voter_login')->name('auth.voter_login')->middleware(['guest', 'voter_guest']);
    Route::post('/voter_login', 'voter_login_logged')->name('auth.voter_login_logged')->middleware(['guest', 'voter_guest']);

    // for admin
    Route::get('/admin_login', 'admin_login')->name('auth.admin_login')->middleware('guest');
    Route::post('/admin_login', 'admin_login_logged')->name('auth.admin_login_logged')->middleware('guest');
    Route::post('/logout', 'logout')->name('auth.logout')->middleware('auth');
});

Route::controller(VoteController::class)->prefix('vote')->middleware(['guest', 'voter_auth'])->group(function () {
    Route::get('/', 'index')->name('vote.index');
    Route::get('/thanks', 'thanks')->name('vote.thanks');
    Route::post('/{candidate:slug}', 'submit')->name('vote.submit');
});

Route::controller(CandidateController::class)->prefix('candidates')->middleware(['guest', 'voter_auth'])->group(function () {
    Route::get('/{candidate:slug}', 'show')->name('candidates.show');
    Route::post('/', 'store')->name('candidates.store')->withoutMiddleware(['guest', 'voter_auth']);
});

Route::controller(AdminController::class)->middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', 'index')->name('admin.index');
    Route::get('/candidate', 'candidate')->name('admin.candidate');
    Route::get('/recapitulation', 'recapitulation')->name('admin.recapitulation');
    Route::view('/change-password', 'admin.change-password')->name('admin.change-password');
    Route::put('/change-password', 'changePassword')->name('admin.change-password');
});

Route::prefix('export')->middleware('auth')->group(function () {
    Route::get('/students', [StudentController::class, 'export'])->name('export.students');
    Route::get('/teachers', [TeacherController::class, 'export'])->name('export.teachers');
});

Route::fallback(fn () => abort(404));

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

// handling authentication
Route::controller(AuthController::class)->prefix('auth')->group(function () {
    // for voter
    Route::get('/voter_login', 'voter_login')->name('auth.voter_login')->middleware(['guest', 'voter_guest']);
    Route::post('/voter_login', 'voter_login_logged')->name('auth.voter_login_logged')->middleware(['guest', 'voter_guest']);

    // for admin
    Route::get('/admin_login', 'admin_login')->name('auth.admin_login')->middleware('guest');
    Route::post('/admin_login', 'admin_login_logged')->name('auth.admin_login_logged')->middleware('guest');
    Route::post('/logout', 'logout')->name('auth.logout')->middleware('auth');
});

// handling voting
Route::controller(VoteController::class)->prefix('vote')->middleware(['guest', 'voter_auth'])->group(function () {
    Route::get('/', 'index')->name('vote.index');
    Route::get('/thanks', 'thanks')->name('vote.thanks');
    Route::post('/{candidate:slug}', 'submit')->name('vote.submit');
});

// handling candidate
Route::controller(CandidateController::class)->prefix('candidates')->middleware(['guest', 'voter_auth'])->group(function () {
    Route::get('/{candidate:slug}', 'show')->name('candidates.show');
    Route::post('/', 'store')->name('candidates.store')->withoutMiddleware(['guest', 'voter_auth']);
});

// handling admin
Route::controller(AdminController::class)->middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', 'index')->name('admin.index');
    Route::view('/import', 'admin.import')->name('admin.import');
    Route::get('/candidate', 'candidate')->name('admin.candidate');
    Route::get('/recapitulation', 'recapitulation')->name('admin.recapitulation');
    Route::view('/change-password', 'admin.change-password')->name('admin.change-password');
    Route::put('/change-password', 'changePassword')->name('admin.change-password');
});

// handling export
Route::prefix('export')->middleware('auth')->group(function () {
    Route::get('/students', [StudentController::class, 'export'])->name('export.students');
    Route::get('/teachers', [TeacherController::class, 'export'])->name('export.teachers');
});

// handling students
Route::controller(StudentController::class)->prefix('students')->middleware('auth')->group(function () {
    Route::delete('/truncate', 'truncate')->name('students.truncate');
});
Route::controller(TeacherController::class)->prefix('teachers')->middleware('auth')->group(function () {
    Route::delete('/truncate', 'truncate')->name('teachers.truncate');
});

// handling import
Route::prefix('import')->middleware('auth')->group(function () {
    Route::post('/students', [StudentController::class, 'import'])->name('import.students');
    Route::post('/teachers', [TeacherController::class, 'import'])->name('import.teachers');
});

Route::fallback(fn () => abort(404));

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnerController;

Route::get('/', [LearnerController::class, 'showHomePage'])->name('homepage');
Route::get('/enrollment', [LearnerController::class, 'showEnrollmentForm'])->name('enrollment');
Route::get('/studentverify', [LearnerController::class, 'showStudentVerify'])->name('studentverify');
Route::get('/trackenrollment', [LearnerController::class, 'showTrackEnrollment'])->name('trackenrollment');
Route::get('/controlnum', [LearnerController::class, 'showControlNum'])->name('controlnum');
Route::get('/login', [LearnerController::class, 'showLoginForm'])->name('login');


Route::get('/forgotpassword', function () {
    return view('forgotpass');
})->name('forgotpass');

Route::get('/verification', function () {
    return view('verifycode');
})->name('verifycode');

Route::get('/changepassword', function () {
    return view('changepassword');
})->name('changepassword');

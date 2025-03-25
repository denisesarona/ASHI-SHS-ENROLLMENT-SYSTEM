<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnerController;

Route::get('/', [LearnerController::class, 'showHomePage'])->name('homepage');
Route::get('/enrollment', [LearnerController::class, 'showEnrollmentForm'])->name('enrollment');
Route::get('/studentverify', [LearnerController::class, 'showStudentVerify'])->name('studentverify');
Route::get('/trackenrollment', [LearnerController::class, 'showTrackEnrollment'])->name('trackenrollment');
Route::get('/controlnum/{id}', [LearnerController::class, 'showControlNum'])->name('controlnum');
Route::get('/viewstatus', [LearnerController::class, 'viewStatus'])->name('viewstatus');
Route::get('/login', [LearnerController::class, 'showLoginForm'])->name('login');
Route::get('/forgotpassword', [LearnerController::class, 'showForgotPassword'])->name('forgotpassword');
Route::get('/verification', [LearnerController::class, 'showVerification'])->name('verifycode');    
Route::get('/changepassword', [LearnerController::class, 'showChangePassword'])->name('changepassword');
Route::get('/learner/{id}/edit', [LearnerController::class, 'editEnrollment'])->name('editenrollment');

Route::post('/enrollment', [LearnerController::class, 'registerLearner'])->name('registerLearner');
Route::post('/trackenrollment', [LearnerController::class, 'trackEnrollmentStatus'])->name('trackEnrollment');
Route::post('/studentverify', [LearnerController::class, 'StudentVerification'])->name('studentVerify');

Route::put('/learner/{id}', [LearnerController::class, 'update'])->name('updateLearnerDetails');

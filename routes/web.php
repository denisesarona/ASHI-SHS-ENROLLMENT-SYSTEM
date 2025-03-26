<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailVerificationController;

Route::get('/', [LearnerController::class, 'showHomePage'])->name('homepage');
Route::get('/enrollment', [LearnerController::class, 'showEnrollmentForm'])->name('enrollment');
Route::get('/studentverify', [LearnerController::class, 'showStudentVerify'])->name('studentverify');
Route::get('/trackenrollment', [LearnerController::class, 'showTrackEnrollment'])->name('trackenrollment');
Route::get('/controlnum/{id}', [LearnerController::class, 'showControlNum'])->name('controlnum');
Route::get('/viewstatus', [LearnerController::class, 'viewStatus'])->name('viewstatus');
Route::get('/learner/{id}/edit', [LearnerController::class, 'editEnrollment'])->name('editenrollment');

Route::post('/enrollment', [LearnerController::class, 'registerLearner'])->name('registerLearner');
Route::post('/trackenrollment', [LearnerController::class, 'trackEnrollmentStatus'])->name('trackEnrollment');
Route::post('/studentverify', [LearnerController::class, 'StudentVerification'])->name('studentVerify');
Route::put('/learner/{id}', [LearnerController::class, 'update'])->name('updateLearnerDetails');

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::get('/forgotpassword', [AdminController::class, 'showForgotPassword'])->name('forgotpassword');
Route::get('/verification', [AdminController::class, 'showVerification'])->name('verifycode');
Route::get('/changepassword', [AdminController::class, 'showChangePassword'])->name('changepassword');
Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');
Route::get('/admin/adminlist', [AdminController::class, 'showAdminList'])->name('adminlist');
Route::get('/admin/addadmin', [AdminController::class, 'showAddAdmin'])->name('addadmin');
Route::get('/admin/pendinglearners', [AdminController::class, 'showPendingLearners'])->name('pendinglearners');
Route::get('/admin/enrolledlearners', [AdminController::class, 'showEnrolledLearners'])->name('enrolledlearners');
Route::get('/admin/admindetails/{id}', [AdminController::class, 'adminDetails'])->name('admindetails');


Route::post('/login', [AdminController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/logout', [AdminController::class, 'logoutAdmin'])->name('logoutAdmin');
Route::put('/admin/admindetails/{id}', [AdminController::class, 'updatePassword'])->name('updatepassword');

Route::get('/admin/admindetails/verifyadmincode', [EmailVerificationController::class, 'verifyAdminCode'])
    ->name('adminemailverification');
Route::post('/admin/verify-code', [EmailVerificationController::class, 'verifyEmail'])->name('sentadmincode');






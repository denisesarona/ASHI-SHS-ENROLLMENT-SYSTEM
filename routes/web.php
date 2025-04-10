<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailVerificationController;
//LearnerController 
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
Route::get('/admin/add-admin', [AdminController::class, 'showAddAdmin'])->name('addadmin');
Route::get('/admin/pendinglearners', [AdminController::class, 'showPendingLearners'])->name('pendinglearners');
Route::get('/admin/enrolledlearners', [AdminController::class, 'showEnrolledLearners'])->name('enrolledlearners');
Route::get('/admin/admindetails/{id}', [AdminController::class, 'adminDetails'])->name('admindetails');
Route::get('/admin/learnerdetails/{id}', [AdminController::class, 'learnerDetails'])->name('learnerdetails');


Route::post('/login', [AdminController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/logout', [AdminController::class, 'logoutAdmin'])->name('logoutAdmin');
Route::put('/admin/admindetails/{id}', [AdminController::class, 'updatePassword'])->name('updatepassword');
Route::post('/admin/add-admin', [AdminController::class, 'addNewAdmin'])->name('addadmin');
Route::post('/forgotpassword', [AdminController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/changepassword', [AdminController::class, 'changePassword'])->name('changePassword');
Route::put('/admin/learnerdetails/{id}', [AdminController::class, 'updateLearner'])->name('updatelearner');

Route::get('/admin/admin-details/verify-email', [EmailVerificationController::class, 'verifyAdminCode'])->name('verify.email.form');
Route::get('/admin/admin-details/verify-add-admin-email', [EmailVerificationController::class, 'showverifyAddAdmin'])->name('verify.add-admin-email');
Route::post('/admin/admin-details/send-verification-email', [EmailVerificationController::class, 'sendVerificationEmail'])->name('send.verification.email');
Route::post('/admin/admin-details/verify-email', [EmailVerificationController::class, 'verifyEmail'])->name('verify.email');
Route::get('/admin/admin-details/verify-add-admin-email', [EmailVerificationController::class, 'verifyAddAdmin'])->name('verify.add-email');
Route::post('/verification', [EmailVerificationController::class, 'verifyCode'])->name('verifycode');

Route::delete('/admin/admin-list/{id}', [AdminController::class, 'destroy'])->name('removeadmin');



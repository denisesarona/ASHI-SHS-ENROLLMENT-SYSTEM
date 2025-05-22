<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\EnrollmentController;

Route::middleware(['auth:admin', 'role:super_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
});

Route::middleware(['auth:admin', 'role:teacher_admin'])->group(function () {
    Route::get('/pending-learners', [LearnerController::class, 'pending']);
    Route::get('/enroll-learners', [LearnerController::class, 'enroll']);
});


Route::get('/', [LearnerController::class, 'index'])->name('homepage');
Route::get('/enrollment', [LearnerController::class, 'showEnrollmentForm'])->name('enrollment');
Route::get('/studentverify', [LearnerController::class, 'showStudentVerify'])->name('studentverify');
Route::get('/trackenrollment', [LearnerController::class, 'showTrackEnrollment'])->name('trackenrollment');
Route::get('/controlnum/{id}', [LearnerController::class, 'showControlNum'])->name('controlnum');
Route::get('/viewstatus', [LearnerController::class, 'viewStatus'])->name('viewstatus');
Route::get('/learner/{id}/edit', [LearnerController::class, 'showEditEnrollmentForm'])->name('editenrollment');

Route::post('/enrollment', [LearnerController::class, 'registerLearner'])->name('registerLearner');
Route::post('/trackenrollment', [LearnerController::class, 'trackEnrollmentStatus'])->name('trackEnrollment');
Route::post('/studentverify', [LearnerController::class, 'StudentVerification'])->name('studentVerify');
Route::put('/learner/{id}', [LearnerController::class, 'update'])->name('updateLearnerDetails');

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::get('/forgotpassword', [AdminController::class, 'showForgotPassword'])->name('forgotpassword');
Route::get('/verification', [AdminController::class, 'showVerification'])->name('showverifycode');
Route::get('/changepassword', [AdminController::class, 'showChangePassword'])->name('changepassword');
Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');
Route::get('/admin/adminlist', [AdminController::class, 'showAdminList'])->name('adminlist');
Route::get('/admin/add-admin', [AdminController::class, 'showAddAdmin'])->name('showaddadmin');
Route::get('/admin/pendinglearners', [AdminController::class, 'showPendingLearners'])->name('pendinglearners');
Route::get('/admin/enrolledlearners', [AdminController::class, 'showEnrolledLearners'])->name('enrolledlearners');
Route::get('/admin/admindetails/{id}', [AdminController::class, 'adminDetails'])->name('admindetails');
Route::get('/admin/learnerdetails/{id}', [AdminController::class, 'learnerDetails'])->name('learnerdetails');
Route::put('/admin/pendinglearnerdetails{id}', [AdminController::class, 'updateLearnerStatus'])->name('updatelearnerstatus');


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
Route::post('/admin/admin-details/verify-add-admin-email', [EmailVerificationController::class, 'verifyAddAdmin'])->name('verify.add-email');
Route::post('/verification', [EmailVerificationController::class, 'verifyCode'])->name('verifycode');
Route::get('/admin/summary', [AdminController::class, 'showSummary'])->name('showsummary');
Route::get('/admin/sections', [AdminController::class, 'showSection'])->name('showsections');

Route::delete('/admin/admin-list/{id}', [AdminController::class, 'destroy'])->name('removeadmin');
Route::delete('/admin/pendinglearnerdetails/{id}', [AdminController::class, 'removeLearner'])->name('removelearner');

Route::get('/admin/enrollmentform', [EnrollmentController::class, 'viewEnrollmentForm'])->name('viewenrollmentform');
Route::put('/admin/enrollmentform/updatesy-gradelevel', [EnrollmentController::class, 'updateSY'])->name('updatesy');
Route::put('/admin/enrollmentform/update-trackstrand', [EnrollmentController::class, 'updateTrackStrand'])->name('updatetrackstrand');
Route::put('/admin/enrollmentform/update-category', [EnrollmentController::class, 'updateCategory'])->name('updatecategory');

Route::delete('/admin/enrollmentform/tracks/{id}', [EnrollmentController::class, 'removeTrack'])->name('removetrack');
Route::delete('/admin/enrollmentform/strands/{id}', [EnrollmentController::class, 'removeStrand'])->name('removestrand');
Route::delete('/admin/enrollmentform/categories/{id}', [EnrollmentController::class, 'removeCategory'])->name('removecategory');

Route::post('/admin/auto-assign-sections', [AdminController::class, 'autoAssignSections'])->name('auto.assign.sections');
Route::post('/admin/sections', [AdminController::class, 'createSection'])->name('createsection');
Route::delete('/admin/remove-sections/{id}', [AdminController::class, 'removeSection'])->name('removesection');
Route::put('/admin/sections/update-strands/{id}', [AdminController::class, 'updateStrands'])->name('updatestrandsection');
Route::put('/admin/sections/assign-section/{id}', [AdminController::class, 'assignSection'])->name('assignsection');
Route::put('/admin/sections/remove-learner-section/{id}', [AdminController::class, 'removeLearnerSection'])->name('removelearnersection');
Route::post('/admin/auto-enroll-learners', [AdminController::class, 'autoEnrollLearners'])->name('auto.enroll.learners');

Route::post('/admin/enrollmentform/savesydata', [AdminController::class, 'saveSchoolYearData'])->name('savesydata');
Route::post('/admin/filter-section', [AdminController::class, 'filterSection'])->name('admin.filter.section');
Route::post('/admin/summary-filter-section', [AdminController::class, 'summaryFilterSection'])->name('admin.summary.filter');
Route::get('/admin/summaries/summarydetails/{id}', [AdminController::class, 'summaryDetails'])->name('summarydetails');

Route::get('/admin/addlearner', [AdminController::class, 'showAddLearner'])->name('showaddlearner');
Route::post('/admin/addnewlearner', [AdminController::class,'addNewLearner'])->name('addnewlearner');
Route::get('/admin/searchlearner', [AdminController::class, 'searchLearner'])->name('searchlearner');
Route::get('/admin/searchlearnersummary', [AdminController::class, 'searchLearnerSummary'])->name('searchlearnersummary');

Route::put('/sections/{id}/update-max-learner', [AdminController::class, 'updateMaxLearnerSingle'])->name('sections.updateMaxLearnerSingle');

Route::get('/learner-map', [EnrollmentController::class, 'showMap'])->name('showmap');
Route::post('/learner-map/update-position', [EnrollmentController::class, 'updatePosition']);
Route::get('/admin/upload-map', [EnrollmentController::class, 'showForm'])->name('upload.map.form');
Route::post('/admin/upload-map', [EnrollmentController::class, 'upload'])->name('upload.map');

Route::get('/form-setup', [FormSetupController::class, 'showForm']);
Route::post('/form-upload', [FormSetupController::class, 'upload']);
Route::post('/form-fields/save', [FormSetupController::class, 'saveFields']);





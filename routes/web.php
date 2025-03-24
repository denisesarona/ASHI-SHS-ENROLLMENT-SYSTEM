<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [LearnerController::class, 'showHomePage'])->name('login');

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/enrollment', function () {
    return view('enrollmentform');
})->name('enrollment');

Route::get('/studentverify', function () {
    return view('studentverify');
})->name('studentverify');

Route::get('/trackenrollment', function () {
    return view('trackenrollment');
})->name('trackenrollment');

Route::get('/controlnum', function () {
    return view('controlnumber');
})->name('controlnum');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/forgotpassword', function () {
    return view('forgotpass');
})->name('forgotpass');

Route::get('/verification', function () {
    return view('verifycode');
})->name('verifycode');

Route::get('/changepassword', function () {
    return view('changepassword');
})->name('changepassword');

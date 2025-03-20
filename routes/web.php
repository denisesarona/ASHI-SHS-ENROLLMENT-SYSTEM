<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/enrollment', function () {
    return view('enrollmentform');
})->name('enrollment');

Route::get('/homepage', function () {
    return view('homePage');
})->name('homepage');

Route::get('/verification', function () {
    return view('studentverify');
})->name('studentverification');

Route::get('/trackenrollment', function () {
    return view('trackenrollment');
})->name('trackenrollment');

Route::get('/controlnum', function () {
    return view('controlnumber');
})->name('controlnum');

Route::get('/login', function () {
    return view('login');
})->name('login');

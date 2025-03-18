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
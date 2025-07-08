<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/kehilangan', function () {
    return view('kehilangan');
})->name('kehilangan');

Route::get('/penemuan', function () {
    return view('penemuan');
})->name('penemuan');

Route::get('/admDashboard', function () {
    return view('admDashboard');
})->name('admDashboard');

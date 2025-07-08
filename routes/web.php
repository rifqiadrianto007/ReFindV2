<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

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

Route::get('/admKehilangan', function () {
    return view('admKehilangan');
})->name('admKehilangan');

Route::get('/admPenemuan', function () {
    return view('admPenemuan');
})->name('admPenemuan');

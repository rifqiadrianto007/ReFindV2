<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/kehilangan', function () {
    return view('kehilangan');
});

Route::get('/penemuan', function () {
    return view('penemuan');
});

<?php

use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/produk', function () {
    return view('produk-index'); 
})->name('produk.index');
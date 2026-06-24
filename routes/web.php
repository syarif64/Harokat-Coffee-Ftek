<?php

use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/produk', function () {
    return view('produk-index');
})->name('produk.index');

// Manajemen Menu & Kategori
Route::get('/menu', function () {
    return view('menu-page');
})->name('menus.index');

// Tambahkan rute ini untuk Kategori:
Route::get('/kategori', function () {
    return view('kategori-index'); // <-- Pastikan kamu punya file resources/views/kategori-index.blade.php
})->name('categories.index');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
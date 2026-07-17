<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\CategoryController;

// 1. HALAMAN UTAMA (Dashboard)
Route::get('/', [MenuController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [MenuController::class, 'dashboard'])->name('dashboard.view');

// 2. ☕ MANAJEMEN MENU
Route::prefix('menu')->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('menus.index');
    Route::get('/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('/', [MenuController::class, 'store'])->name('menus.store');
    Route::delete('/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
    Route::patch('/{id}/toggle-status', [MenuController::class, 'toggleStatus'])->name('menus.toggleStatus');
});

// 3. 📦 PRODUK & KATEGORI
Route::get('/produk', function () { return view('produk-index'); })->name('produk.index');
Route::get('/kategori', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/kategori', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/kategori/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/kategori/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// 4. 📦 PESANAN (Sudah dirapikan)
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
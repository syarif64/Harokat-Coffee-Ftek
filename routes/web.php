<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard Route
Route::get('/dashboard', [MenuController::class, 'dashboard'])->name('dashboard');

Route::get('/', function () {
    return redirect('/menu');
});


Route::get('/produk', function () {
    return view('produk-index');
})->name('produk.index');

// ☕ MANAJEMEN MENU
// 1. Menampilkan Tabel Daftar Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menus.index');

// 2. Menampilkan Form Tambah Menu
Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');

// 3. Proses Menyimpan Data ke Database
Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');

// 4. Proses Menghapus Menu
Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');

// 5. Proses Mengubah Status Menu (Tersedia / Habis)
Route::patch('/menu/{id}/toggle-status', [MenuController::class, 'toggleStatus'])->name('menus.toggleStatus');

// 📂 MANAJEMEN KATEGORI
Route::get('/kategori', function () {
    return view('kategori-index');
})->name('categories.index');
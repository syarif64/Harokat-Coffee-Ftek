<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;


Route::resource('categories', CategoryController::class);
Route::resource('menus', MenuController::class);
Route::get('/', function () {
    return view('dashboard');
});

require __DIR__.'/settings.php';
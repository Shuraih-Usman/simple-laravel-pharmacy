<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\catController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ajaxController;


Route::get('/', function () {
    return view('welcome');
});

// Route::resource('category', catController::class);

Route::get('category', [CatController::class, 'index']);
Route::get('add-product', [ProductController::class, 'add']);
Route::get('product', [ProductController::class, 'index']);
Route::get('edit/{id}', [ProductController::class, 'edit']);
Route::any('/{modelname}/process', [ajaxController::class, 'process']);



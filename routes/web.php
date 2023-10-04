<?php

use App\Http\Controllers\Client\AllCategoryController;
use App\Http\Controllers\Client\HomePageController;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;






Route::get('/', [HomePageController::class, 'index'])->name('');
Route::get('/all-category', [AllCategoryController::class, 'index'])->name('all-category');
Route::get('/product-detail/{id}', [ProductController::class, 'show'])->name('product-detail');
Route::get('/product-list', [ProductController::class, 'index'])->name('product-list');

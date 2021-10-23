<?php

use App\Http\Controllers\Pscp\CategoryController;
use App\Http\Controllers\Pscp\DashboardController;
use App\Http\Controllers\Pscp\ProductController;
use App\Http\Controllers\Pscp\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('dashboard',DashboardController::class);
Route::resource('/',DashboardController::class);
Route::resource('categories',CategoryController::class);
Route::resource('subcategories',SubCategoryController::class);
Route::get('products/pending',[ProductController::class,'pending'])->name('products.pending');
Route::resource('products',ProductController::class);
Route::get('categories/{id}/subcategory',[CategoryController::class,'subCategory'])->name('categories.subcategory');



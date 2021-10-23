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

Route::post('add_new_category',[CategoryController::class, 'store'])->name('add_new_category');
Route::get('category/delete/{id}',[CategoryController::class, 'delete']);
Route::get('category/edit/{id}',[CategoryController::class, 'edit']);
Route::post('category/edit',[CategoryController::class, 'edit_category'])->name('edit_category');


Route::post('add_new_subcategory',[SubCategoryController::class, 'store'])->name('add_new_subcategory');
Route::get('subcategory/delete/{id}',[SubCategoryController::class, 'delete']);
Route::get('subcategory/edit/{id}',[SubCategoryController::class, 'edit']);
Route::post('subcategory/edit',[SubCategoryController::class, 'edit_subcategory'])->name('edit_subcategory');

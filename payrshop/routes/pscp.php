<?php

use App\Http\Controllers\Pscp\CategoryController;
use App\Http\Controllers\Pscp\DashboardController;
use App\Http\Controllers\Pscp\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('dashboard',DashboardController::class);
Route::resource('/',DashboardController::class);
Route::resource('categories',CategoryController::class);
Route::resource('subcategories',SubCategoryController::class);


Route::post('add_new_category',[CategoryController::class, 'store'])->name('add_new_category');
Route::get('category/delete/{id}',[CategoryController::class, 'delete']);
Route::get('category/edit/{id}',[CategoryController::class, 'edit']);
Route::post('category/edit',[CategoryController::class, 'edit_category'])->name('edit_category');


Route::post('add_new_subcategory',[SubCategoryController::class, 'store'])->name('add_new_subcategory');
Route::get('subcategory/delete/{id}',[SubCategoryController::class, 'delete']);

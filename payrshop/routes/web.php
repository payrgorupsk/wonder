<?php

use App\Http\Controllers\WoUserController;
use App\Http\Controllers\EshopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', EshopController::class);
Route::resource('users', WoUserController::class);
Route::get('/categories', [EshopController::class,'categories'])->name('categories');
Route::get('/category/{category}', [EshopController::class,'category'])->name('category');
Route::get('/product/{product}', [EshopController::class,'product'])->name('product');
Route::get('/payrmall', [EshopController::class,'payrmall'])->name('payrmall');
Route::get('/flash-sale', [EshopController::class,'flashsale'])->name('flashsale');

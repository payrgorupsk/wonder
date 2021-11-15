<?php

use App\Http\Controllers\WoUserController;
use App\Http\Controllers\EshopController;
use App\Http\Controllers\PayPalPaymentController;
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

Route::get('/', [EshopController::class,'index'])->name('home');
Route::resource('users', WoUserController::class);
Route::get('/categories', [EshopController::class,'categories'])->name('categories');
Route::get('/category/{category}', [EshopController::class,'category'])->name('category');
Route::get('/product/{product}', [EshopController::class,'product'])->name('product');
Route::get('/payrmall', [EshopController::class,'payrmall'])->name('payrmall');
Route::get('/flash-sale', [EshopController::class,'flashsale'])->name('flashsale');

Route::post('/order', [EshopController::class,'order'])->name('order');
Route::post('/place_order', [EshopController::class,'place_order'])->name('place_order');

//paypal
Route::get('handle-payment', [PayPalPaymentController::class,'handlePayment'])->name('make.paypal');
Route::get('cancel-payment', [PayPalPaymentController::class,'paymentCancel'])->name('cancel.paypal');
Route::get('payment-success', [PayPalPaymentController::class,'paymentSuccess'])->name('success.paypal');

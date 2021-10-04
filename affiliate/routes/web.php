<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ApproveController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/affiliate_form', [HomeController::class, 'form'])->name('affiliate_form');
Route::post('/affiliate_form', [HomeController::class, 'form_save'])->name('affiliate_form_save');


//admin

Route::prefix('admin')->group(function () {

    Route::get('/approve', [ApproveController::class, 'index'])->name('approve');

});

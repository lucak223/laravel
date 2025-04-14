<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\adminproductController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\cartcontroller;
use App\Http\Middleware\checkadmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GoogleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('page.home');
// });
Route::get('/',[PageController::class, 'index']);
Route::get('/detail/{slug}',[ProductController::class, 'detail']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login', [UserController::class, 'postlogin'])->name('postlogin');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::resource('/cart', cartController::class);

Route::post('/payment', [PaymentController::class, 'create']);
Route::get('/payment/result', [PaymentController::class, 'result']);

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::prefix('/admin')->middleware(checkadmin::class)->group(function () {
    Route::get('/', [adminController::class, 'dashboard']);
    Route::resource('product', adminproductController::class);
});
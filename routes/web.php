<?php

use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [AuthController::class, 'formRegister'])->name('formRegister');
Route::post('/register-user', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('list-products', [ProductController::class, 'index'])->name('list.product');
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('purchase-made', [OrderProductController::class, 'create'])->name('purchase-made');
//Route::get('details-purchase', [OrderProductController::class, 'index'])->name('purchase-details');
Route::get('cart/{id}', [ProductController::class, 'show'])->name('cart.add');
Route::get('cart-delete/{id}', [ProductController::class, 'destroy'])->name('cart.delete');



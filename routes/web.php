<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('LoginController.login');
Route::get('/register', [LoginController::class, 'register'])->name('LoginController.register');
Route::get('/logout', [LoginController::class, 'logout'])->name('LoginController.logout');

Route::get('list-products', [ProductController::class, 'index'])->name('list.product');

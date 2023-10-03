<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\PasswordController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

    Route::resource('users', UserController::class);
});
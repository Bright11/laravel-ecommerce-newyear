<?php

use App\Http\Controllers\register\registerController;
use Illuminate\Support\Facades\Route;


Route::get('register',[registerController::class,'register'])->name('register');

Route::post('registeruser',[registerController::class, 'registeruser'])->name('registeruser');
Route::get('login', [registerController::class, 'login'])->name('login');
Route::post('loginuser', [registerController::class, 'loginuser'])->name('loginuser');
Route::get('logout', [registerController::class, 'logout'])->name('logout');

//

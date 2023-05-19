<?php

use App\Http\Controllers\adminpagesController;
use Illuminate\Support\Facades\Route;


Route::get('adminindex',[adminpagesController::class, 'adminindex'])->name('adminindex');
Route::get("addproduct",[adminpagesController::class, 'addproduct'])->name('addproduct');
Route::get('viewproduct',[adminpagesController::class, 'viewproduct'])->name('viewproduct');
Route::get('category',[adminpagesController::class, 'category'])->name('category');

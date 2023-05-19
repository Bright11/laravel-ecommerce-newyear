<?php

use App\Http\Controllers\adminpagesController;
use App\Http\Controllers\postcontroller;
use Illuminate\Support\Facades\Route;


Route::post('addcartdb',[postcontroller::class, 'addcartdb'])->name('addcartdb');
Route::post('insertproduct', [postcontroller::class, 'insertproduct'])->name('insertproduct');

<?php

use App\Http\Controllers\frontendpagescontroll;
use Illuminate\Support\Facades\Route;


Route::get('/',[frontendpagescontroll::class,'index'])->name('index');

Route::get('/allcategory/{slug}', [frontendpagescontroll::class, 'allcategory'])->name('allcategory');
Route::get('details/{slug}',[frontendpagescontroll::class, 'details'])->name('details');

Route::post('addtocart/{id}',[frontendpagescontroll::class, 'addtocart'])->name('addtocart');
Route::get('cartpage',[frontendpagescontroll::class, 'cartpage'])->name('cartpage');

Route::post('removeitem/{id}', [frontendpagescontroll::class, 'removeitem'])->name('removeitem');

Route::get('removeallcart', [frontendpagescontroll::class, 'removeallcart'])->name('removeallcart');
Route::post('addtowishlist/{id}', [frontendpagescontroll::class, 'addtowishlist'])->name('addtowishlist');
Route::get('mywishlist', [frontendpagescontroll::class, 'mywishlist'])->name('mywishlist');

Route::get('checkout', [frontendpagescontroll::class, 'checkout'])->name('checkout');


//

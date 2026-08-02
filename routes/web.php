<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/categories/{category}',
    [CategoryController::class, 'show'])
    ->name('show.category');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('show.product');

Route::post('/orders', [OrderController::class, 'store'])->middleware('log.order.ip')->name('orders.store');


Route::get('/profile', [ProfileController::class, 'show'])->middleware(['auth', 'verified'])->name('profile.show');

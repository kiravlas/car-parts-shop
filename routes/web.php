<?php

use App\Http\Controllers\Store\Cart\CartController;
use App\Http\Controllers\Store\Categories\CategoryController;
use App\Http\Controllers\Store\Checkout\CheckoutController;
use App\Http\Controllers\Store\HomeController;
use App\Http\Controllers\Store\Orders\Assignment\AssignmentOrderController;
use App\Http\Controllers\Store\Orders\OrderController;
use App\Http\Controllers\Store\Products\ProductController;
use App\Http\Controllers\Store\Products\ProductLikeController;
use App\Http\Controllers\Store\Products\WishlistController;
use App\Http\Controllers\Store\Profile\AvatarController;
use App\Http\Controllers\Store\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

// Assignment
Route::post('/assignment/orders', [AssignmentOrderController::class, 'store'])
    ->middleware('log.order.ip')
    ->name('assignment.orders.store');

// Store
Route::get('/', [HomeController::class, 'index'])
    ->name('home.index');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/wishlist', [WishlistController::class, 'index'])
    ->name('wishlist.index')->middleware('auth');

Route::prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('/', [ProductController::class, 'index'])
            ->name('index');
        Route::get('/{product}', [ProductController::class, 'show'])
            ->name('show');
        Route::post('/{product}/toggle-like', [ProductLikeController::class, 'toggle'])
            ->middleware('auth')
            ->name('toggle-like');
    });

// Cart
Route::middleware('auth')->prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])
        ->name('index');

    Route::post('/', [CartController::class, 'store'])
        ->name('store');

    Route::put('/{cartItem}', [CartController::class, 'update'])
        ->name('update');

    Route::delete('/{cartItem}', [CartController::class, 'destroy'])
        ->name('destroy');

});

// Checkout
Route::middleware(['auth', 'verified'])->prefix('checkout')->name('checkout.')->group(function () {

    Route::post('/', [CheckoutController::class, 'checkout'])
        ->name('store');

    Route::get('/success', [CheckoutController::class, 'success'])
        ->name('success');

    Route::get('/cancel', [CheckoutController::class, 'cancel'])
        ->name('cancel');

});

// Profile
Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {

    Route::get('/', [ProfileController::class, 'show'])
        ->name('show');

    Route::get('/edit', [ProfileController::class, 'edit'])
        ->name('edit');

    Route::post('/avatar/update', [AvatarController::class, 'update'])
        ->name('avatar.update');

    Route::delete('/avatar/delete', [AvatarController::class, 'destroy'])
        ->name('avatar.destroy');

    Route::get('/security', [ProfileController::class, 'security'])
        ->name('security');

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');

});

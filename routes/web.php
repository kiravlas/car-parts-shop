<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Store\Cart\CartController;
use App\Http\Controllers\Store\Categories\CategoryController;
use App\Http\Controllers\Store\Checkout\CheckoutController;
use App\Http\Controllers\Store\HomeController;
use App\Http\Controllers\Store\Products\ProductController;
use App\Http\Controllers\Store\Products\ProductLikeController;
use App\Http\Controllers\Store\Products\WishlistController;
use App\Http\Controllers\Store\Profile\AvatarController;
use App\Http\Controllers\Store\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

// Store

Route::get('/', [HomeController::class, 'index'])
    ->name('home.index');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('product.show');

Route::post('/products/{product}/toggle-like', [ProductLikeController::class, 'toggle'])
    ->name('products.toggle-like')->middleware('auth');

Route::get('/wishlist', [WishlistController::class, 'index'])
    ->name('wishlist.index')->middleware('auth');

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

});

// Admin Dashboard

Route::middleware(['auth', 'can:access-admin-dashboard'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('categories', AdminCategoryController::class)
            ->except('show');

        Route::resource('products', AdminProductController::class);

        Route::patch(
            '/product-images/{image}/set-primary',
            [AdminProductController::class, 'setPrimaryImage']
        )->name('product-images.set-primary');

        Route::delete(
            '/product-images/{image}',
            [AdminProductController::class, 'destroyImage']
        )->name('product-images.destroy');
    });

// Assignment

// Route::post(
//     '/assignment/orders',
//     [AssignmentOrderController::class, 'store']
// )->middleware('log.order.ip')
// ->name('assignment.orders.store');

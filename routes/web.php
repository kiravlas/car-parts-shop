<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Store\Cart\CartController;
use App\Http\Controllers\Store\Categories\CategoryController;
use App\Http\Controllers\Store\HomeController;
use App\Http\Controllers\Store\Products\ProductController;
use App\Http\Controllers\Store\Products\ProductLikeController;
use App\Http\Controllers\Store\Products\WishlistController;
use App\Http\Controllers\Store\Profile\AvatarController;
use App\Http\Controllers\Store\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('product.show');
//like product
Route::get('/wishlist', [WishlistController::class, 'index'])
    ->name('wishlist.index');

Route::post('/products/{product}/toggle-like', [ProductLikeController::class, 'toggle'])
    ->name('products.toggle-like');

//Route for assignment email request
//Route::post('assignment/orders', [AssignmentOrderController::class, 'store'])->middleware('log.order.ip')
//    ->name('assignment.orders.store');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

Route::put('/cart/{cartItem}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::post('profile/avatar/update', [AvatarController::class, 'update'])->name('profile.avatar.update');
Route::delete('profile/avatar/delete', [AvatarController::class, 'destroy'])->name('profile.avatar.destroy');

Route::get('/profile/security', [ProfileController::class, 'security'])->name('profile.security');

Route::middleware(['auth', 'can:access-admin-dashboard'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', AdminCategoryController::class)->except('show');
    Route::resource('products', AdminProductController::class);

    Route::patch('/product-images/{image}/set-primary',
        [AdminProductController::class, 'setPrimaryImage'])->name('product-images.set-primary');
    Route::delete('/product-images/{image}',
        [AdminProductController::class, 'destroyImage'])->name('product-images.destroy');

});


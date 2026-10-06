<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'can:access-admin-dashboard'])
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('categories', AdminCategoryController::class)
            ->except('show');

        Route::resource('products', AdminProductController::class)
            ->except('show');

        Route::patch(
            '/product-images/{image}/set-primary',
            [AdminProductController::class, 'setPrimaryImage']
        )->name('product-images.set-primary');

        Route::delete(
            '/product-images/{image}',
            [AdminProductController::class, 'destroyImage']
        )->name('product-images.destroy');
    });

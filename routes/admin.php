<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'auth.type:admin,super-admin'])->prefix('/admin')->group(function() {

    Route::get('/products/trashed', [ProductsController::class, 'trashed'])
        ->name('products.trashed');
    Route::put('/products/{product}/restore', [ProductsController::class, 'restore'])
        ->name('products.restore');
    Route::delete('/products/{product}/force', [ProductsController::class, 'forceDelete'])
        ->name('products.force-delete');
    Route::resource('/products', ProductsController::class);

    Route::resource('/categories', CategoriesController::class);
    Route::resource('/orders', OrdersController::class);

});



<?php

use Modules\Product\Controllers\ProductResourceController;
use Modules\Product\Models\Product;

Route::prefix('/admin')
//    ->as('admin.')
        ->middleware(['web', 'auth'])
    ->group(function () {
        Route::resource(Product::NAME, ProductResourceController::class);
    });

<?php

use Modules\Lot\Controllers\LotController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')
    ->middleware(['auth', 'web'])
    ->group(function () {
        Route::resource('lot', LotController::class)->only('index', 'show');
    });

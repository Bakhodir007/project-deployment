<?php

use Modules\Auth\Controllers\AuthLoginController;
use Modules\Auth\Controllers\UsersResourceController;

Route::middleware('web')
    ->group(function () {
        Route::resource('user', UsersResourceController::class);

        Route::get('login', [AuthLoginController::class, 'show'])->name('show')->middleware(['guest']);
        Route::post('login', [AuthLoginController::class, 'login'])->name('login')->middleware(['guest']);
        Route::match(['post', 'get'], 'logout', [AuthLoginController::class, 'logout'])->name('logout')->middleware('auth');
    });

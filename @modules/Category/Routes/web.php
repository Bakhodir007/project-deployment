<?php

use Modules\Category\Controllers\{CategoryResourceController, CategorySpecificationResourceController};
use Modules\Category\Models\{Category, CategorySpecification};

Route::prefix('/admin')
//    ->as('admin.')
    ->middleware(['web', 'auth'])
    ->group(function () {
        Route::resource(Category::NAME, CategoryResourceController::class);
        Route::resource(CategorySpecification::NAME, CategorySpecificationResourceController::class);
    });

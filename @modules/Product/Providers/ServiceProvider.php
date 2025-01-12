<?php

namespace Modules\Product\Providers;

use Livewire\Livewire;
use Modules\Product\Livewire\CreateProductComponent;
use Modules\Product\Livewire\UpdateProductComponent;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'product');
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');

        Livewire::component('create-product-component', CreateProductComponent::class);
        Livewire::component('edit-product-component', UpdateProductComponent::class);
    }
}

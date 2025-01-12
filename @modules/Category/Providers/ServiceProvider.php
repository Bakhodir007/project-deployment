<?php

namespace Modules\Category\Providers;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'category');
    }
}

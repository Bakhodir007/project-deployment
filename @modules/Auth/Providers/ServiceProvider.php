<?php

namespace Modules\Auth\Providers;

use Livewire\Livewire;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'auth');

        Livewire::component('login-form-component', \Modules\Auth\Livewire\AuthLoginFormComponent::class);
    }
}

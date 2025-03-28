<?php

namespace Agrianalytica\Admin;

use Illuminate\Support\ServiceProvider;
use Agrianalytica\Admin\Repositories\RoleRepository;
use Agrianalytica\Admin\Services\RoleService;

class AdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/Views', 'admin');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/admin'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../public/assets' => public_path('assets'),
        ], 'public');
    }

    public function register()
    {
        // Здесь можно регистрировать сервисы
        $this->app->bind(RoleRepository::class);
        $this->app->bind(RoleService::class);
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
    }
}

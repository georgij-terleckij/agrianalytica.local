<?php

namespace Agrianalytica\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/Views', 'admin');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        // Публикуем представления
        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/admin'),
        ], 'views');
    }

    public function register()
    {
        // Здесь можно регистрировать сервисы
    }
}

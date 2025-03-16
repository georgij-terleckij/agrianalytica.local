<?php

namespace Agrianalytica\FrontEnd;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class FrontEndServiceProvider extends ServiceProvider
{
    /**
     * Регистрация сервисов.
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/Views', 'front');
        $this->publishes([
            __DIR__.'/../public/assets' => public_path('assets'),
        ], 'public');
    }

    /**
     * Запуск сервисов.
     */
    public function boot()
    {
        // Публикация конфигурации, если потребуется в будущем
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/Config/front.php' => config_path('front.php'),
            ], 'config');
        }
    }
}

<?php

namespace Jeelsureja\LaravelDuplicationChecker\Providers;

use Illuminate\Support\ServiceProvider;

class DuplicationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/duplication.php', 'duplication');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'duplication');

        $this->publishes([
            __DIR__.'/../../config/duplication.php' => config_path('duplication.php'),
        ], 'config');
    }
}
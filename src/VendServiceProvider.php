<?php

namespace SteadfastCollective\LaravelVend;

use Illuminate\Support\ServiceProvider;
use SteadfastCollective\LaravelVend\ApiRequestor;

class VendServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/vend.php' => $this->app->configPath('vend.php'),
            ], 'vend-config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/vend.php', 'vend');

        $this->app->singleton(ApiRequestor::class, function () {
            return new ApiRequestor();
        });
    }
}

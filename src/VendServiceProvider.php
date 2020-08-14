<?php

namespace SteadfastCollective\LaravelVend;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use SteadfastCollective\LaravelVend\ApiRequestor;

class VendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->registerPublishing();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->configure();

        $this->app->singleton(ApiRequestor::class, function () {
            return new ApiRequestor();
        });
    }

    /**
     * Setup the configuration for Digitickets.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/vend.php',
            'vend'
        );
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/vend.php' => $this->app->configPath('vend.php'),
            ], 'vend-config');
        }
    }
}

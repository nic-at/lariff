<?php
namespace Nicat\Lariff;

use Illuminate\Support\ServiceProvider;

/**
 * Created by NIC.at GmbH.
 * User: marioo
 * Date: 04.05.2016
 * Time: 13:55
 */
class LariffServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap Page services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootConfig();

        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    private function bootConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/lariff.php', 'lariff'
        );

        $this->publishes([
            __DIR__ . '/config/lariff.php' => config_path('lariff')
        ]);
    }
}
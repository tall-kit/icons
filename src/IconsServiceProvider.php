<?php

namespace TallKit\Icons;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use TallKit\Icons\Components\Icon;

class IconsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/tall-icons.php' => config_path('tall-icons.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/tall-icons.php', 'tall-icons');

        $this->registerComponents();
    }

    /**
     * @return void
     */
    private function registerComponents(): void
    {
        Blade::component(Icon::class, 'icon');
    }
}

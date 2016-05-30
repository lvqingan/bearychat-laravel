<?php

namespace Lvqingan\BearychatLaravel;

use Illuminate\Support\ServiceProvider;

class BearyLaravelServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        // published config file
        $this->publishes([
            __DIR__.'/config/bearychat.php' => config_path('bearychat.php')
        ], 'bearychat');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('bearychat-laravel', function () {
            return new BearyChat();
        });
    }
}

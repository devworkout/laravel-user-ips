<?php

namespace DevWorkout\UserIps;

use Illuminate\Support\ServiceProvider;

class UserIpsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ( $this->app->runningInConsole() )
        {
            $this->publishes( [
                __DIR__ . '/../config/config.php' => config_path( 'laravel-user-ips.php' ),
            ], 'config' );

            $this->loadMigrationsFrom( [
                __DIR__ . '/../database/migrations',
            ] );

        }

        \Event::listen('Illuminate\Auth\Events\Login', function($event) {
            $event->user->rememberIp( request()->ip() );
        });

    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__ . '/../config/config.php', 'laravel-user-ips' );
    }
}

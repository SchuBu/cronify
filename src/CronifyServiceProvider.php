<?php

namespace Schubu\Cronify;

use Illuminate\Support\ServiceProvider;
use Schubu\Cronify\Console\Commands\CronifyCommands;

class CronifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'cronify');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'cronify');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
        /*    $this->publishes([
                __DIR__.'/../config/config.php' => config_path('cronify.php'),
            ], 'config');*/

            if (! class_exists('CreateCronsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_crons_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_crons_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }

            $this->commands([
                CronifyCommands::class,
            ]);


            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/cronify'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/cronify'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/cronify'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'cronify');

        // Register the main class to use with the facade
        $this->app->singleton('cronify', function () {
            return new Cronify;
        });
    }
}

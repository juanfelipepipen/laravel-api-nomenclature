<?php

namespace Pipen\ApiNomenclature;

use Illuminate\Support\ServiceProvider;

class ApiNomenclatureSuiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap web services, listen for events, publish configuration file
     * or database migrations
     *
     * @return void
     */
    public function boot(): void
    {
        // Register config file
//        $this->publishes([
//            __DIR__ . '/../config/api-testing.php' => config_path('api-testing.php')
//        ]);

        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                // TODO.
            ]);
        }
    }

    /**
     * Extends functionality from another classes, register services providers
     * and create singleton classes
     *
     * @return void
     */
    public function register(): void
    {
        // TODO.
    }
}
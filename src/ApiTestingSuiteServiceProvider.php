<?php

namespace Pipen\ApiNomenclature;

use Illuminate\Support\ServiceProvider;
use Pipen\ApiNomenclature\Console\RunTestsCommand;
use Pipen\ApiNomenclature\Traits\DatabaseConfigs;

class ApiNomenclatureSuiteServiceProvider extends ServiceProvider
{
    use DatabaseConfigs;

    /**
     * Bootstrap web services, listen for events, publish configuration file
     * or database migrations
     *
     * @return void
     */
    public function boot(): void
    {
        $this->setDatabaseConnection();

        // Register config file
        $this->publishes([
            __DIR__ . '/../config/api-testing.php' => config_path('api-testing.php')
        ]);

        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                RunTestsCommand::class
            ]);
        }
    }

    /**
     * Extends functionality from another classes, register services providers
     * and create singleton classes
     *
     * @return void
     */
    public function register(): void { }
}
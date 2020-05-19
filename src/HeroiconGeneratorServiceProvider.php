<?php

namespace Plmrlnsnts\HeroiconGenerator;

use Illuminate\Support\ServiceProvider;
use Plmrlnsnts\HeroiconGenerator\Commands\HeroiconsBuildCommand;

class HeroiconGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/js' => resource_path('js'),
            ], 'heroicons');

            $this->commands([
                HeroiconsBuildCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}

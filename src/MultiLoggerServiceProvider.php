<?php

namespace Truffolone\MultiLogger;

use Truffolone\MultiLogger\Facades\MultiLogger;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class MultiLoggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('MultiLogger', function()
        {

            return new MultiLogger();

        });
    }
}

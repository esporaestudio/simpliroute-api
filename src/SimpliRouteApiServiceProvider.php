<?php

namespace Espora\HttpLogger;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

use Espora\HttpLogger\Commands\PurgeCommand;
use Espora\HttpLogger\Middleware\LogRequest;

class SimpliRouteApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Nothing to boot
    }

    public function register()
    {
        // Nothing to register
    }
}

<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            $isProduction = app()->environment('production');

            $configureRoute = function ($name, $domain, $path) use ($isProduction) {
                $middleware = $name === 'settings' ? ['web', 'auth'] : ['web'];

                $route = Route::middleware($middleware);

                if ($isProduction) {
                    $route->domain($domain);
                } else {
                    $route->prefix($path);
                }

                $route->group(base_path("routes/{$name}.php"));
            };

            $configureRoute('auth', 'auth.mtex.dev', 'auth');
            $configureRoute('settings', 'settings.mtex.dev', 'settings');
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
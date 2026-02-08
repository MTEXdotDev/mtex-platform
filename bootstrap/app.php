<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            $isProduction = app()->environment('production');

            $configureRoute = function ($name, $domain, $path) use ($isProduction) {
                $middleware = match ($name) {
                    'settings' => ['web', 'auth'],
                    'go' => ['web'],
                    default => ['web'],
                };
                
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
            $configureRoute('go', 'go.mtex.dev', 'go');
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
    })
    ->withExceptions(function (Exceptions $exceptions) {
        if(!config('app.debug')){
            $exceptions->render(function (Throwable $e, Request $request) {
                if ($request->is('api/*') || $request->wantsJson()) {
                    return null;
                }

                $statusCode = 500;

                if ($e instanceof HttpExceptionInterface) {
                    $statusCode = $e->getStatusCode();
                } elseif ($e instanceof ModelNotFoundException) {
                    $statusCode = 404;
                } elseif ($e instanceof NotFoundHttpException) {
                    $statusCode = 404;
                }

                try {
                    $titleKey = "errors.{$statusCode}.title";
                    $title = __($titleKey);
                    if ($title === $titleKey) {
                        $title = __('errors.default.title');
                    }

                    $description = null;

                    if ($e instanceof HttpExceptionInterface && !empty($e->getMessage())) {
                        $description = $e->getMessage();
                    }

                    if (empty($description)) {
                        $descKey = "errors.{$statusCode}.description";
                        $description = __($descKey);
                        if ($description === $descKey) {
                            $description = __('errors.default.description');
                        }
                    }
                } catch (Throwable $t) {
                    $title = "Error " . $statusCode;
                    $description = "An unexpected error occurred.";
                }

                return response()->view('pages.errors', [
                    'error_code' => $statusCode,
                    'title' => $title,
                    'description' => $description,
                ], $statusCode);
            });
        };
    })->create();
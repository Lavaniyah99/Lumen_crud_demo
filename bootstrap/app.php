<?php

require_once __DIR__.'/../vendor/autoload.php';

use Laravel\Lumen\Application;
use Laravel\Lumen\Bootstrap\LoadEnvironmentVariables;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Console\Kernel;

(new LoadEnvironmentVariables(dirname(__DIR__)))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
*/
$app = new Application(dirname(__DIR__));

/*
|--------------------------------------------------------------------------
| Enable Facades and Eloquent ORM
|--------------------------------------------------------------------------
*/
$app->withFacades();
$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
*/
$app->singleton(ExceptionHandler::class, App\Exceptions\Handler::class);
$app->singleton(Kernel::class, App\Console\Kernel::class);

/*
|--------------------------------------------------------------------------
| Register Configuration Files
|--------------------------------------------------------------------------
*/
$app->configure('app');

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
*/
// Route Middleware (Uncomment if exists)
$app->routeMiddleware([
    'auth' => App\Http\Middleware\AuthMiddleware::class,
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
*/
$app->register(Illuminate\Database\MigrationServiceProvider::class);
// Uncomment if these exist
// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);

/*
|--------------------------------------------------------------------------
| Load Application Routes
|--------------------------------------------------------------------------
*/
$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;

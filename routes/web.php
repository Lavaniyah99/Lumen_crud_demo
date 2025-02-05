<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/register', 'AuthController@register'); // Allow GET for testing
$router->post('/register', 'AuthController@register'); 

$router->get('/login', 'AuthController@login'); // Allow GET for testing
$router->post('/login', 'AuthController@login');

$router->get('/user', 'AuthController@getUser');

$router->get('/', function () use ($router) {
    return $router->app->version(); // Returns Lumen version
});

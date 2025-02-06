<?php

/** @var \Laravel\Lumen\Routing\Router $router */

// Authentication Routes
$router->post('/register', 'AuthController@register'); 
$router->post('/login', 'AuthController@login'); 

// User CRUD Routes
$router->get('/user/{id}', 'AuthController@getUser'); // Get user by ID
$router->put('/user/{id}', 'AuthController@updateUser'); // Update user
$router->delete('/user/{id}', 'AuthController@deleteUser'); // Delete user

// Default route (check if API is working)
$router->get('/', function () use ($router) {
    return response()->json(['message' => 'Lumen API is running!', 'version' => $router->app->version()]);
});

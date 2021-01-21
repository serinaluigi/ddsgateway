<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'client.credentials'],function() use ($router){

    // Site1
    $router->get('/users1','User1Controller@getUsers');
    $router->get('/users1/{id}','User1Controller@getUser');
    $router->put('/users1/update/{id}','User1Controller@updateUser');
    $router->delete('/users1/delete/{id}','User1Controller@deleteUser');
    $router->post('/users1/add','User1Controller@addUser');

    // Site2
    $router->get('/users2','User2Controller@getUsers');
    $router->get('/users2/{id}','User2Controller@getUser');
    $router->put('/users2/update/{id}','User2Controller@updateUser');
    $router->delete('/users2/delete/{id}','User2Controller@deleteUser');
    $router->post('/users2/add','User2Controller@addUser');
});
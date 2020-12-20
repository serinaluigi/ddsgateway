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

$router->group(['middleware'=>'client.credentials'],function() use($router) {

// Routes for Site1
Route::get('/users1', 'User1Controller@getUsers');
Route::post('/users1', 'User1Controller@addUser');
Route::get('/users1/{id}', 'User1Controller@show');
Route::put('/users1/put/{id}', 'User1Controller@update');
Route::delete('/users1/delete/{id}', 'User1Controller@delete');

// Routes for Site2
Route::get('/users2', 'User2Controller@getUsers');
Route::post('/users2', 'User2Controller@addUser');
Route::get('/users2/{id}', 'User2Controller@show');
Route::put('/users2/put/{id}', 'User2Controller@update');
Route::delete('/users2/delete/{id}', 'User2Controller@delete');

});

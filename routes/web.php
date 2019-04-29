<?php

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
//
// $router->get('/key', function() {
//     return str_random(32);
// });

$router->get('/autores','AuthorsController@index');
$router->post('/autores','AuthorsController@store');
$router->get('/autores/{id}','AuthorsController@show');
$router->put('/autores/{id}','AuthorsController@update');
$router->patch('/autores/{id}','AuthorsController@update');
$router->delete('/autores/{id}','AuthorsController@destroy');

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
$router->get('/todo', 'PostController@post_list');
$router->get('/todo/{id_post}', 'PostController@byId');
$router->post('/create-todo', 'PostController@create_post');
$router->delete('/todo/delete/{id_post}', 'PostController@delete');
$router->put('/todo/update/{id_post}', 'PostController@update');
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

/** @var $router \Laravel\Lumen\Routing\Router */

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->group(['prefix' => 'charts'], function () use ($router) {
        $router->get('weekly-retention', 'ChartsController@getWeeklyRetention');
    });

    $router->get('/info', function () use ($router) {
        return $router->app->version();
    });
});

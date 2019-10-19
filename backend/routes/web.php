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

$router->group(['prefix' => 'api/v1'], static function () use ($router) {
    $router->group(['prefix' => 'charts'], static function () use ($router) {
        $router->get('weekly-retention', 'ChartsController@getWeeklyRetention');
    });

    $router->get('/info', static function () use ($router) {
        return $router->app->version();
    });
});

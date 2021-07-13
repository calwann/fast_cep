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

$router->get('/{address}', 'CepController@index');

$router->get('/', function () {
    return redirect('/Pra%C3%A7a%20da%20S%C3%A9%20lado%20%C3%ADmpar%20S%C3%A3o%20Paulo%20SP');
});

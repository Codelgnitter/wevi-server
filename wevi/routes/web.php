<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/collect/http', 'DataLogController@collectHttp');
Route::get('/collect/mqtt', 'DataLogController@collectMqtt');
Route::get('/mqtt', 'DataLogController@mqttclient');
Route::get('/main/current', 'MainViewController@current');
Route::get('/charts', 'chartContrtoller@chart');

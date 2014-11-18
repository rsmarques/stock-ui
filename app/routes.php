<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');
Route::get ('/chart',  'StockController@chartIndex');
Route::post('/chart',  'StockController@chart');
Route::get ('/create', 'StockController@createIndex');
Route::post('/create', 'StockController@create');

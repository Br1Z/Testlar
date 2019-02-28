<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::auth();
Route::get('/','HomeController@main');
Route::get('/home', 'HomeController@index');
Route::get('message', 'HomeController@send');
Route::post('message', 'HomeController@store');
Route::get('delete/{id}', 'HomeController@del');
Route::get('removeall', 'HomeController@all');


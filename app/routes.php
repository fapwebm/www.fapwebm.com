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
Route::get('/test/', 'VideoController@test');

Route::get('/{board}/search/{term}', 'VideoController@search');
Route::get('/{board?}', 'VideoController@index');
Route::get('/{board}/{num}', 'VideoController@page');

// Route::get('v/thumb/{src}', 'VideoController@thumbnail');
// Route::get('/tag/{tag}', 'VideoController@search');
// Route::get('/category/{tag}', 'VideoController@search');
// Route::get('/submit', 'VideoController@create');
// Route::post('/submit/post', 'VideoController@store');
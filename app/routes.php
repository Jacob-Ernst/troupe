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

Route::get('/', 'HomeController@showHome');

Route::get('/admin', 'HomeController@showAdmin');

Route::post('/login', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@doLogout');

Route::post('/avi', 'UsersController@uploadAvi');

Route::resource('users', 'UsersController');

Route::resource('performances', 'PerformancesController');

Route::resource('meetings', 'MeetingsController');

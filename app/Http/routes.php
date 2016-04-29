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

Route::get('/', ['as' => 'landing', 'uses' => 'LandingController@index']);
//Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::get('/dashboard', ['as' => 'home', 'uses' => 'DashboardController@dashboard']);

Route::singularResourceParameters();

Route::resource('projects', 'ProjectsController');

Route::get('company', ['as' => 'company.show', 'uses' => 'CompaniesController@show']);
Route::put('company', ['as' => 'company.update', 'uses' => 'CompaniesController@update']);
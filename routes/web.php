<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Pages routes
Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');
Route::get('howitworks', 'PagesController@getHowItWorks');
Route::get('fordevelopers', 'PagesController@getForDevelopers');
Route::get('fortestusers', 'PagesController@getForTestUsers');

//Authentication routes
Auth::routes();

//Dashboard routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/projects', 'HomeController@projects')->name('projects');
Route::get('/results', 'HomeController@results')->name('results');
Route::get('/account/details', 'HomeController@account')->name('account');

//Resource routes
Route::resource('projects', 'ProjectController');
Route::resource('tests', 'TestController');
Route::resource('introductions', 'IntroductionController');
Route::resource('tasks', 'TaskController');
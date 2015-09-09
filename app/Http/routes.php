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
/*
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{

	Route::resource('/', 'AdminController@index');
	Route::resource('users/{id?}', 'AdminController@users');
	Route::resource('advisors/{advisor?}', 'AdminController@advisors');
	Route::resource('conferences/{conference?}', 'AdminController@conferences');
	Route::resource('speakers/{speaker?}', 'AdminController@speakers');
	Route::resource('topics/{topic?}', 'AdminController@topics');

});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
*/

Route::get('/', 'PagesController@index');
Route::get('about', 'PagesController@about');
Route::get('conferences/{conference?}', 'ConferencesController@index');

Route::get('contact/sponsorship/{conference?}', 'ContactController@index');
Route::post('contact/sponsorship/{conference?}', 'ContactController@index');

Route::get('contact/{contact?}', ['as' => 'contact', 'uses' => 'ContactController@index']);
Route::post('contact/{contact?}', ['as' => 'contact_store', 'uses' => 'ContactController@store']);


Route::get('register/{conference?}', 'RegistrationController@index');
Route::post('register/{conference?}', 'RegistrationController@store');

Route::get('{conference?}', 'ConferencesController@index');


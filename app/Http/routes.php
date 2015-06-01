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

// Admin categorias
Route::group(['prefix' => 'categorias', 'middleware' => 'auth'], function()
{

	Route::get('', 					['as' => 'category.index', 'uses' => 'CategoryController@index']);
	Route::post('salvar', 			['as' => 'category.store', 'uses' => 'CategoryController@store']);
	Route::get('{id}/editar', 		['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
	Route::post('{id}/atualizar', 	['as' => 'category.update', 'uses' => 'CategoryController@update']);
	Route::get('{id}/remover', 		['as' => 'category.destroy', 'uses' => 'CategoryController@destroy']);

});


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

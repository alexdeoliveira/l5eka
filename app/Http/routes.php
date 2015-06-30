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
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
    
    Route::group(['prefix' => 'conta'], function () {
        Route::get('',                  ['as' => 'account.index', 'uses' => 'AccountController@index']);
        Route::get('senha',             ['as' => 'account.password', 'uses' => 'AccountController@password']);
    });

    // Admin categorias
    Route::group(['prefix' => 'categorias'], function () {

        Route::get('',                  ['as' => 'category.index', 'uses' => 'CategoryController@index']);
        Route::post('salvar',           ['as' => 'category.store', 'uses' => 'CategoryController@store']);
        Route::get('{id}/editar',       ['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
        Route::post('{id}/atualizar',   ['as' => 'category.update', 'uses' => 'CategoryController@update']);
        Route::get('{id}/remover',      ['as' => 'category.destroy', 'uses' => 'CategoryController@destroy']);

    });

    // Admin projetos
    Route::group(['prefix' => 'projetos'], function () {

        Route::get('',                  ['as' => 'project.index', 'uses' => 'ProjectController@index']);
        Route::post('salvar',           ['as' => 'project.store', 'uses' => 'CategoryController@store']);
        Route::get('{id}/editar',       ['as' => 'project.edit', 'uses' => 'ProjectController@edit']);
        Route::post('{id}/atualizar',   ['as' => 'project.update', 'uses' => 'ProjectController@update']);
        Route::get('{id}/remover',      ['as' => 'project.destroy', 'uses' => 'ProjectController@destroy']);

    });
});



Route::get('/', function(){
    redirect()->route('dashboard.index');
});

Route::get('home', function(){
    redirect()->route('dashboard.index');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

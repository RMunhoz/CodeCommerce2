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

Route::pattern('id', '[0-9]+');

Route::group(['prefix'=>'admin'], function(){

    Route::group(['prefix'=>'categories'], function(){

        Route::get('/', ['as'=>'categories.index', 'uses'=>'AdminCategoriesController@index']);
        Route::get('/create', ['as'=>'categories.create', 'uses'=>'AdminCategoriesController@create']);
        Route::post('/store', ['as'=>'categories.store','uses'=>'AdminCategoriesController@store']);
        Route::get('/{id}/destroy', ['as'=>'categories.destroy','uses'=>'AdminCategoriesController@destroy']);
        Route::get('/{id}/edit', ['as'=>'categories.edit','uses'=>'AdminCategoriesController@edit']);
        Route::put('/{id}/update', ['as'=>'categories.update','uses'=>'AdminCategoriesController@update']);

    });

    Route::group(['prefix'=>'products'], function(){

        Route::get('/', ['as'=>'products.index', 'uses'=>'AdminProductsController@index']);

    });

});


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

Route::get('test', 'CheckoutController@test');

Route::controllers([

    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',

]);

Route::get('home', ['as' => 'home', 'uses' => 'StoreController@index']);

Route::get('/', ['as' => 'store.index', 'uses' => 'StoreController@index']);
Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag']);

Route::group(['prefix' => 'cart'], function () {

    Route::get('/', ['as' => 'cart', 'uses' => 'CartController@index']);
    Route::get('/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
    Route::get('/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
    Route::put('/update/{id}', ['as' => 'cart.update', 'uses' => 'CartController@update']);

});

Route::group(['middleware' => 'auth'], function () {

    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'where' => ['id' => '[0-9]+']], function () {

    Route::get('', ['as' => 'painel.index', 'uses' => 'AdminController@index']);

    Route::group(['prefix'=>'account'], function(){

        Route::get('', ['as' => 'account.index', 'uses' => 'AccountController@index']);
        Route::get('/{id}/edit', ['as' => 'account.edit', 'uses' => 'AccountController@edit']);
        Route::put('/{id}/update', ['as' => 'account.update', 'uses' => 'AccountController@update']);

    });

    Route::group(['prefix' => 'users'], function () {

        Route::get('', ['as' => 'users.index', 'uses' => 'AdminUsersController@index']);
        Route::get('{id}/show', ['as' => 'users.show', 'uses' => 'AdminUsersController@show']);
        Route::get('{id}/destroy', ['as' => 'users.destroy', 'uses' => 'AdminUsersController@destroy']);

    });

    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', ['as' => 'categories.index', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/create', ['as' => 'categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::post('/store', ['as' => 'categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('/{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
        Route::get('/{id}/edit', ['as' => 'categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('/{id}/update', ['as' => 'categories.update', 'uses' => 'AdminCategoriesController@update']);

    });

    Route::group(['prefix' => 'products'], function () {

        Route::get('/', ['as' => 'products.index', 'uses' => 'AdminProductsController@index']);
        Route::get('/create', ['as' => 'products.create', 'uses' => 'AdminProductsController@create']);
        Route::post('/store', ['as' => 'products.store', 'uses' => 'AdminProductsController@store']);
        Route::get('/{id}/destroy', ['as' => 'products.destroy', 'uses' => 'AdminProductsController@destroy']);
        Route::get('/{id}/edit', ['as' => 'products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('/{id}/update', ['as' => 'products.update', 'uses' => 'AdminProductsController@update']);

        Route::get('/{id}/image', ['as' => 'products.image', 'uses' => 'AdminProductsController@images']);
        Route::get('/{id}/image/create', ['as' => 'products.create.image', 'uses' => 'AdminProductsController@createImage']);
        Route::post('/{id}/image/store', ['as' => 'products.store.image', 'uses' => 'AdminProductsController@storeImage']);
        Route::get('/{id}/image/destroy', ['as' => 'products.destroy.image', 'uses' => 'AdminProductsController@destroyImage']);

    });

});



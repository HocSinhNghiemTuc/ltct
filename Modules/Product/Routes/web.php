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

Route::prefix('admin')->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'ProductController@index',
            'middleware' => 'can:admin'
        ]);

        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'ProductController@create',
            'middleware' => 'can:admin'
        ]);
        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'ProductController@store',
            'middleware' => 'can:admin'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'ProductController@edit',
            'middleware' => 'can:admin'
        ]);

        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'ProductController@update',
            'middleware' => 'can:admin'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'ProductController@delete',
            'middleware' => 'can:admin'
        ]);

    });

});

Route::get('/search', [
    'as' => 'product.search',
    'uses' => 'ProductController@search'
]);

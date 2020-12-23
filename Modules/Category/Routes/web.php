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
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
            'middleware' => 'can:admin'
        ]);

        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
            'middleware' => 'can:admin'
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store',
            'middleware' => 'can:admin'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit',
            'middleware' => 'can:admin'
        ]);

        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update',
            'middleware' => 'can:admin'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete',
            'middleware' => 'can:admin'
        ]);

    });

});

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

Route::prefix('admin')->group(function (){
    Route::prefix('payment')->group(function (){
        Route::get('/index',[
            'as'=>'payment.index',
            'uses'=>'AdminPaymentsController@index'
        ]);
        Route::post('/update/{id}',[
            'as'=>'payment.update',
            'uses'=>'AdminPaymentsController@update'
        ]);
        Route::post('/create',[
            'as'=>'payment.create',
            'uses'=>'AdminPaymentsController@create'
        ]);
        Route::delete('/delete/{id}',[
            'as'=>'payment.delete',
            'uses'=>'AdminPaymentsController@delete'
        ]);
        Route::post('/state/{id}',[
            'as'=>'payment.state',
            'uses'=>'AdminPaymentsController@state'
        ]);
    });
});


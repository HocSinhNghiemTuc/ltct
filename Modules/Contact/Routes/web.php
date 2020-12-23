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
Route::prefix('feedback')->group(function () {
    Route::post('/create',[
        'as'=>'feedback.create',
        'uses'=>'FeedbacksController@create'
    ]);
});
Route::prefix('admin')->group(function (){
    Route::prefix('contact')->group(function (){
        Route::get('/index',[
            'as'=>'contact.index',
            'uses'=>'AdminContactController@index',
            'middleware' => 'can:admin'
        ]);
        Route::post('/update/{id}',[
            'as'=>'contact.update',
            'uses'=>'AdminContactController@update',
            'middleware' => 'can:admin'
        ]);
        Route::post('/create',[
            'as'=>'contact.create',
            'uses'=>'AdminContactController@create',
            'middleware' => 'can:admin'
        ]);
        Route::delete('/delete/{id}',[
            'as'=>'contact.delete',
            'uses'=>'AdminContactController@delete',
            'middleware' => 'can:admin'
        ]);
        Route::post('/state/{id}',[
            'as'=>'contact.state',
            'uses'=>'AdminContactController@state',
            'middleware' => 'can:admin'
        ]);
        Route::post('/show/{id}',[
            'as'=>'contact.show',
            'uses'=>'AdminContactController@show',
            'middleware' => 'can:admin'
        ]);
    });
    Route::prefix('feedback')->group(function (){
        Route::get('/index',[
            'as'=>'feedback.index',
            'uses'=>'AdminFeedbackController@index',
            'middleware' => 'can:admin'
        ]);
        Route::post('/solved/{id}',[
            'as'=>'feedback.state',
            'uses'=>'AdminFeedbackController@solved',
            'middleware' => 'can:admin'
        ]);
    });
});

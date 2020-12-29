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
            'uses'=>'AdminContactController@index'
        ]);
        Route::post('/update/{id}',[
            'as'=>'contact.update',
            'uses'=>'AdminContactController@update'
        ]);
        Route::post('/create',[
            'as'=>'contact.create',
            'uses'=>'AdminContactController@create'
        ]);
        Route::delete('/delete/{id}',[
            'as'=>'contact.delete',
            'uses'=>'AdminContactController@delete'
        ]);
        Route::post('/state/{id}',[
            'as'=>'contact.state',
            'uses'=>'AdminContactController@state'
        ]);
        Route::post('/show/{id}',[
            'as'=>'contact.show',
            'uses'=>'AdminContactController@show'
        ]);
    });
    Route::prefix('feedback')->group(function (){
        Route::get('/index',[
            'as'=>'feedback.index',
            'uses'=>'AdminFeedbackController@index'
        ]);
        Route::post('/solved/{id}',[
            'as'=>'feedback.state',
            'uses'=>'AdminFeedbackController@solved'
        ]);
    });
});

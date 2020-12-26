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
            'uses'=>'AdminPaymentsController@index',
            'middleware' => 'can:payment-list'
        ]);
        Route::post('/update/{id}',[
            'as'=>'payment.update',
            'uses'=>'AdminPaymentsController@update',
            'middleware' => 'can:payment-edit'
        ]);
        Route::post('/create',[
            'as'=>'payment.create',
            'uses'=>'AdminPaymentsController@create',
            'middleware' => 'can:payment-add'
        ]);
        Route::delete('/delete/{id}',[
            'as'=>'payment.delete',
            'uses'=>'AdminPaymentsController@delete',
            'middleware' => 'can:payment-delete'
        ]);
        Route::post('/state/{id}',[
            'as'=>'payment.state',
            'uses'=>'AdminPaymentsController@state',
            'middleware' => 'can:payment-state'
        ]);
    });
    Route::prefix('carts')->group(function (){
        Route::get('/index',[
            'as'=>'admin_cart.index',
            'uses'=>'AdminCartsController@index',
            'middleware' => 'can:admin'
        ]);
    });
    Route::prefix('order')->group(function (){
        Route::get('/index',[
            'as'=>'order.index',
            'uses'=>'AdminCartsController@index',
            'middleware' => 'can:order-list'
        ]);
    });
});
Route::prefix('carts')->group(function (){
    Route::get('/cancel/{id}',[
        'as'=>'cart.cancel',
        'uses'=>'CartsController@cancel'
    ]);
    Route::get('/history',[
        'as'=>'cart.history',
        'uses'=>'CartsController@cartHistory'
    ]);
    Route::post('/add_product/{id}',[
        'as'=>'cart.plus_product',
        'uses'=>'CartsController@plus_product'
    ]);
    Route::get('/delete_product/{id}',[
        'as'=>'cart.delete_product',
        'uses'=>'CartsController@delete_product'
    ]);
    Route::post('/minus_product/{id}',[
        'as'=>'cart.minus_product',
        'uses'=>'CartsController@minus_product'
    ]);
    Route::get('/index',[
        'as'=>'cart.index',
        'uses'=>'CartsController@index'
    ]);
    Route::get('/checkout',[
        'as'=>'cart.checkout',
        'uses'=>'CartsController@checkout'
    ]);
    Route::post('/end_checkout',[
        'as'=>'cart.end_checkout',
        'uses'=>'CartsController@end_checkout'
    ]);
});

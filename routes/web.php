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

Route::get('/login', 'AdminController@loginAdmin')->name('login');
Route::post('/login', 'AdminController@postLoginAdmin');
Route::get('/signup', 'AdminController@signUpAdmin');
Route::post('/signup', 'AdminController@postSignUpAdmin');
Route::get('/logout', 'AdminController@logout');
Route::get('/', [
    'as' => 'homepage',
    'uses' => 'Home@index'
]);


Route::get('/admin', function () {
    return view('home');
});
Route::prefix('admin')->group(function () {

    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'AdminRoleController@index'
        ]);
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'AdminRoleController@create'
        ]);
        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'AdminRoleController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'AdminRoleController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'AdminRoleController@update'
        ]);

    });

});

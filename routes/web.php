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
Route::get('/', [
    'as' => 'homepage',
    'uses' => 'Home@index'
]);


Route::get('/admin', function () {
    return view('home');
});

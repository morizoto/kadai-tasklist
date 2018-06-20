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

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');     //signup
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');               //signup


Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');   
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');




Route::get('/', 'TasksController@index');

Route::resource('tasks', 'TasksController');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
});
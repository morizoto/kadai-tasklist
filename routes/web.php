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


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');      //login
Route::post('login', 'Auth\LoginController@login')->name('login.post');        //login
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');       //login


Route::get('/', 'TasksController@index');

Route::resource('tasks', 'TasksController');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('tasks', 'TasksController', ['only' => ['index', 'show']]);
});
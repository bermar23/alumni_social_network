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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

  Route::get('/profile', 'ProfileController@index')->name('profile');

  Route::get('/setting', 'HomeController@index')->name('setting');

  Route::put('/profile', 'ProfileController@update')->name('profile');

  Route::get('/security', 'HomeController@index')->name('security');

  Route::get('/security', 'HomeController@index')->name('security');

});

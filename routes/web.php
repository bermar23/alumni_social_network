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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

  Route::get('/profile', 'ProfileController@index')->name('profile');

  Route::get('/setting', 'HomeController@index')->name('setting');

  Route::put('/profile', 'ProfileController@update')->name('profile');

  Route::get('/security', 'HomeController@index')->name('security');

  Route::get('/security', 'HomeController@index')->name('security');

  Route::post('/profile/image-upload', 'ProfileController@imageUploadPost')->name('image.upload.post');

  Route::get('/posts/image/{filename}', ['uses' => 'PostController@getPostImage', 'as' => 'posts.image']);

  Route::get('/posts/show/{post_id}', 'PostController@show')->name('posts.show');


  Route::group(['middleware' => ['admin']], function () {

    Route::get('/registrations', 'RegistrationController@index')->name('registrations');

    Route::get('/registrations/edit/{user_id}', 'RegistrationController@edit')->name('registrations.edit');

    Route::get('/registrations/delete/{user_id}', 'RegistrationController@destroy')->name('registrations.delete');

    Route::get('/posts', 'PostController@index')->name('posts');

    Route::get('/posts/create', 'PostController@create')->name('posts.create');

    Route::post('/posts/store', 'PostController@store')->name('posts.store');

    Route::get('/posts/edit/{post_id}', 'PostController@edit')->name('posts.edit');

    Route::put('/posts/update/{post_id}', 'PostController@update')->name('posts.update');

  });

});

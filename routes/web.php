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

Route::get('/', 'WelcomeController@index')->name('welcome');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/threads', 'ThreadController')->except(['show']);
    Route::resource('/threads/{thread}/posts', 'PostController')->only(['create', 'store']);
    Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
});
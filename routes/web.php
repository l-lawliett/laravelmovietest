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


Route::get('/', 'WelcomeController@index')->name('Welcome');

Auth::routes();
Route::get('/films', 'Films\FilmsController@index')->name('Film');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'api'], function() {
  // protected routes here
 Route::resource('films','Films\FilmsController');

});

Route::group(['prefix' => 'api'], function() {
  // protected routes here
 Route::resource('comments','CommentController');

});

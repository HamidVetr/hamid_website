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

Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('socialite.login');
Route::get('/auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('socialite.redirect');

Route::group(['namespace' => 'VisitorControllers'], function (){
    Route::get('/contact-me', 'ContactMeController@create')->name('visitor.contact-me.create');
    Route::post('/contact-me', 'ContactMeController@store')->name('visitor.contact-me.store');
    Route::resource('/movie', 'MovieController');
    Route::get('/movie/{imdbId}/watched', 'MovieController@addMovieToWatched')->name('movies.addMovieToWatched');
});
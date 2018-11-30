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
});

Route::get('/file_manager/{slug?}', 'AdminControllers\FileManagerController@index')
    ->name('file_manager.index')
    ->where('slug', '([A-Za-z0-9\-\/]*)');
Route::post('/file_upload/{slug?}', 'AdminControllers\FileManagerController@upload')
    ->name('file_manager.upload')
    ->where('slug', '([A-Za-z0-9\-\/]*)');;
Route::post('/file_manager/store', 'AdminControllers\FileManagerController@store')->name('file_manager.store');

Route::get('/test', function(){
    return view('test');
});
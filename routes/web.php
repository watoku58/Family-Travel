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

Route::get('/', 'HomeController@browse');
Route::get('/home', 'HomeController@browse');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('topic/create', 'User\TopicController@add');
    Route::post('topic/create', 'User\TopicController@create');
    Route::get('topic', 'User\TopicController@index');
    Route::get('topic/edit', 'User\TopicController@edit');
    Route::post('topic/edit', 'User\TopicController@update');
    Route::get('topic/delete', 'User\TopicController@delete');
    Route::get('topic/browse', 'User\TopicController@browse');
    
    Route::get('profile/create', 'User\ProfileController@add');
    Route::post('profile/create', 'User\ProfileController@create');
    Route::get('profile', 'User\ProfileController@index');
    Route::get('profile/edit', 'User\ProfileController@edit');
    Route::post('profile/edit', 'User\ProfileController@update');
    Route::get('profile/delete', 'User\ProfileController@delete');
    
    //Route::post('topic/browse', 'User\TopicController@store');
    //Route::post('topic/browse', 'User\TopicController@delete');
    
    Route::post('favorite/store', 'User\FavoriteController@store');
    // Route::post('topic/browse', 'User\FavoriteController@delete');
});
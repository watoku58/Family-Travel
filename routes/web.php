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
    return view('home');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('topic/create', 'User\TopicController@add');
    Route::post('topic/create', 'User\TopicController@create');
    Route::get('topic', 'User\TopicController@index');
    Route::get('topic/edit', 'User\TopicController@edit');
    Route::post('topic/edit', 'User\TopicController@update');
    Route::get('topic/delete', 'User\TopicController@delete');
    Route::get('profile/create', 'User\ProfileController@add');
    Route::post('profile/create', 'User\ProfileController@create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

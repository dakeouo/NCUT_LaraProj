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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', [
    'middleware' => 'auth',
    'uses' => 'HomeController@profile'
]);

Route::group(['prefix' => 'choice', 'middleware' => 'auth'], function() {
	Route::get('/', ['uses' => 'ChoiceController@index']);
	Route::get('create', ['uses' => 'ChoiceController@create']);
	Route::post('create', ['as' => 'choice.create', 'uses' => 'ChoiceController@store']);
	Route::get('edit/{id}', ['uses' => 'ChoiceController@edit']);
	Route::patch('edit/{id}', ['as' => 'choice.edit', 'uses' => 'ChoiceController@update']);
});


Route::get('/homework', [
    'middleware' => 'auth',
    'uses' => 'HomeworkController@index'
]);
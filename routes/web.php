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

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function() {
	Route::get('/', ['uses' => 'HomeController@profile']);
	Route::get('edit', ['uses' => 'HomeController@edit']);
	Route::post('edit', ['as' => 'profile.edit', 'uses' => 'HomeController@update']);
});

Route::group(['prefix' => 'choice', 'middleware' => 'auth'], function() {
	Route::get('/', ['uses' => 'ChoiceController@index']);
	Route::get('create', ['uses' => 'ChoiceController@create']);
	Route::post('create', ['as' => 'choice.create', 'uses' => 'ChoiceController@store']);
	Route::get('edit/{id}', ['uses' => 'ChoiceController@edit']);
	Route::patch('edit/{id}', ['as' => 'choice.edit', 'uses' => 'ChoiceController@update']);
	Route::delete('delete/{id}', ['uses' => 'ChoiceController@destroy']);
	Route::get('hwAns/{id}', ['uses' => 'ChoiceController@answer']);
	Route::post('hwAns/{id}', ['as' => 'choice.answer','uses' => 'ChoiceController@submit']);
});

Route::group(['prefix' => 'homework', 'middleware' => 'auth'], function() {
	Route::get('/', ['uses' => 'HomeworkController@index']);
	Route::get('create', ['uses' => 'HomeworkController@create']);
	Route::post('create', ['as' => 'homework.create', 'uses' => 'HomeworkController@store']);
	Route::get('edit/{id}', ['uses' => 'HomeworkController@edit']);
	Route::patch('edit/{id}', ['as' => 'homework.edit', 'uses' => 'HomeworkController@update']);
	Route::delete('delete/{id}', ['uses' => 'HomeworkController@destroy']);
	Route::get('show/{id}', ['uses' => 'HomeworkController@show']);
	Route::get('hwScore/{id}', ['uses' => 'HomeworkController@hwScore']);
	Route::get('hwPractice/{id}', ['uses' => 'HomeworkController@practice']);
	Route::post('hwPractice/{id}', ['as' => 'homework.practice','uses' => 'HomeworkController@upload']);
	Route::get('mark/{id}/{uid?}', ['uses' => 'HomeworkController@mark']);
	Route::post('mark/{id}/{uid?}', ['as' => 'mark.post', 'uses' => 'HomeworkController@correct']);
});
<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

	


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::get('hello', 'PostController@index');
	// View Resource
	Route::get('post/{id}', 'PostController@show');
	// Create Resource
	Route::get('create/post', 'PostController@create');
	Route::post('create/post', 'PostController@store');
	// Edit Resource
	Route::get('edit/post/{id}', 'PostController@edit');
	Route::put('edit/post/{id}', 'PostController@update');
	// Delete Resource
	Route::delete('delete/post/{id}', 'PostController@destroy');
});

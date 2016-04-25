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
	// Authentication Routes...
	$this->get('login', 'Auth\AuthController@showLoginForm');
	$this->post('login', 'Auth\AuthController@login');
	$this->get('logout', 'Auth\AuthController@logout');

	// Registration Routes...
	$this->get('register', 'Auth\AuthController@showRegistrationForm');
	$this->post('register', 'Auth\AuthController@register');

	// Password Reset Routes...
	$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	$this->post('password/reset', 'Auth\PasswordController@reset');

    Route::get('/home', 'HomeController@index');

	// Post Routes...
	Route::get('hello', 'PostController@index');
	// View Resource
	Route::get('post/{id}', 'PostController@show');

	// User Routes...
	Route::get('user/{id}', 'UserController@show');

	// AUTH USER ROUTES
	Route::group(['middleware' => ['auth']], function () {
		// User Routes...
		Route::put('update/user/{id}', 'UserController@update');

		// Create Resource
		Route::get('create/post', 'PostController@create');
		Route::post('create/post', 'PostController@store');
		// Edit Resource
		Route::get('edit/post/{id}', 'PostController@edit');
		Route::put('edit/post/{id}', 'PostController@update');
		// Delete Resource
		Route::delete('delete/post/{id}', 'PostController@destroy');
	});

	// ADMIN ROUTES
	Route::group(['middleware' => ['auth', 'role:Administrator']], function () {

		// User Routes
		Route::get('users', 'UserController@index');
	});
});


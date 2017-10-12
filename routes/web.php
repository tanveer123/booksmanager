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

/*Main side routes*/
Route::group(['middlewear' => 'web'], function () {
	Route::get('/', 'MainController@index');
    Route::get('login', 'Auth\LoginController@index');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('racks', 'RacksController@index');
    Route::get('books/{id}', 'BooksController@index');
    Route::post('books/{id}', 'BooksController@searchbooks');
});

/*Admin side routes*/
Auth::routes();
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
	Route::get('/login', 'Auth\LoginController@showLoginForm');
	Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout');
	Route::get('home', 'HomeController@index');
	
	//Racks Routes
	Route::get('racks', 'RacksController@index');
    Route::get('getrack', 'RacksController@getrack');
	Route::post('racks', 'RacksController@save');
	Route::post('racks/{id}', 'RacksController@update');
	Route::post('delrack', 'RacksController@delrack');
	Route::post('delmracks', 'RacksController@delmracks');

    //Books Routes
    Route::get('books', 'BooksController@index');
    Route::get('getbook', 'BooksController@getbook');
    Route::post('books', 'BooksController@save');
    Route::post('books/{id}', 'BooksController@update');
    Route::post('delbook', 'BooksController@delbook');
    Route::post('delmbooks', 'BooksController@delmbooks');
});
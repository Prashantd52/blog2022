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
Route::middleware(['auth'])->group(function(){

    Route::get('/categories/create','CategoryController@create');
    Route::post('/categories_store','CategoryController@store');
    Route::get('/categories/edit/{id}','CategoryController@edit');
    Route::put('/categories/update','CategoryController@update');
    Route::delete('/categories/delete/{id}','CategoryController@destroy');
    Route::get('/categories/show/{id}','CategoryController@show');
});
Route::get('/categories/index','CategoryController@index');

//tag routes
Route::get('tags/create','TagController@create');
Route::post('/tags/store','TagController@store');
Route::get('tags/index','TagController@index');
Route::get('tags/edit/{id}','TagController@edit');
Route::put('tags/update/{id}','TagController@update');
Route::get('tags/delete/{id}','TagController@destroy');
Route::get('tags/show/{id}','TagController@show');
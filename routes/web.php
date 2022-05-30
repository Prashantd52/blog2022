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
    Route::get('/categories/shoft_deleted','CategoryController@soft_deleted_categories');
    Route::get('/categories/restore/{id}','CategoryController@restore_category');
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
Route::get('tags/shoft_deleted','TagController@shoft_deleted_tags');
Route::get('tags/restore/{id}','TagController@restore_tag');


//blog routes

Route::get('blog/create','BlogController@create')->name('b_create');
Route::post('blog/store','BlogController@store')->name('b_store');
Route::get('blog/index','BlogController@index')->name('b_index');
Route::get('blog/edit/{blog}','BlogController@edit')->name('b_edit');
Route::put('blog/update/{blog}','BlogController@update')->name('b_update');
Route::delete('blog/delete','BlogController@destroy')->name('b_delete');
Route::get('blog/soft_deleted','BlogController@soft_deleted_blogs')->name('b_sod');
Route::get('blog/restore/{id}','BlogController@restore_blog')->name('b_restore');
Route::get('blog/show/{slug}','BlogController@show')->name('b_show');
Route::get('blog/delete_image/{id}','BlogController@delete_image')->name('b_d_image');


//comment routes
Route::get('comment/create/{blogid}','CommentController@create')->name('c_comment');
// Route::post('comment/store','CommentController@store')->name('s_comment');
// Route::get('comment/index','CommentController@index')->name('i_comment');
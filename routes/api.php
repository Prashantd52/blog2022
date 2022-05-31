<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categeory_index','Api\CategoryController@index');
Route::post('category_show','Api\CategoryController@show');
Route::post('category_store','Api\CategoryController@store');


//comments route

Route::post('save_comment','Api\CommentController@store_comment');

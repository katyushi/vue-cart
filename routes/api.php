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

Route::post('/products/create', 'PostController@store');
Route::get('/products/edit/{id}', 'PostController@edit');
Route::post('/products/update/{id}', 'PostController@update');
Route::delete('/products/delete/{id}', 'PostController@delete');
Route::get('/products', 'PostController@index');
Route::get('/products/{id}', 'PostController@getOne');
Route::get('/cart', 'CartController@index');
Route::post('/addtocart', 'CartController@store');
Route::delete('/cart/delete/{id}', 'CartController@delete');

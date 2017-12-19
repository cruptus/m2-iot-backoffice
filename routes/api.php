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

Route::middleware('apiAuthenticate')->group(function () {
    Route::options('{user}/products', 'ProductController@api');
    Route::get('{user}/products', 'ProductController@api');

    Route::options('user', 'UserController@api');
    Route::post('user', 'UserController@api');
});



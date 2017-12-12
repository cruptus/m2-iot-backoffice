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

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->middleware(['auth'])->name('logout');
Route::get('/register/{token}', 'HomeController@register')->where('token', '[a-zA-Z0-9]+')->name('register');
Route::post('/register', 'HomeController@registerPost')->name('registerPost');


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::middleware(['auth'])->prefix('administration')->group(function () {
    Route::get('/', 'HomeController@admin')->name('dashboard');

    Route::middleware(['admin'])->prefix('users')->group(function () {
        Route::get('/datatable', 'UserController@dataTable')->name('users.datatables');
        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('/create', 'UserController@show')->name('users.show');
        Route::post('/create', 'UserController@create')->name('users.create');
        Route::get('/{user}', 'UserController@view')->name('users.view');
        Route::post('/{user}', 'UserController@update')->name('users.update');
        Route::delete('/delete/{user}', 'UserController@delete')->name('users.delete');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/datatable', 'OrderController@dataTable')->name('orders.datatables');
        Route::get('/', 'OrderController@index')->name('orders.index');
        Route::get('/{order}', 'OrderController@view')->name('orders.view');
    });
});

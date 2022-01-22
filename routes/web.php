<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('login', 'HomeController@login');
Route::post('login', 'Auth\LoginController@login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', 'Auth\LoginController@logout');
});

Route::group(['middleware' => ['auth','CheckPermission']], function () {
    Route::get('users', 'UserController@index');
    Route::get('users/create', 'UserController@create');
    Route::post('users/store', 'UserController@store');
    Route::get('users/edit/{user_id}', 'UserController@edit');
    Route::post('users/update', 'UserController@update');
    Route::post('users/delete', 'UserController@delete');

    Route::get('sales-representatives', 'SalesRepresentativeController@index');
    Route::get('sales-representatives/create', 'SalesRepresentativeController@create');
    Route::post('sales-representatives/store', 'SalesRepresentativeController@store');
    Route::get('sales-representatives/edit/{user_id}', 'SalesRepresentativeController@edit');
    Route::post('sales-representatives/update', 'SalesRepresentativeController@update');
    Route::post('sales-representatives/delete', 'SalesRepresentativeController@delete');
});


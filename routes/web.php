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

Auth::routes();
Route::get('/', 'ItemsController@index');
Route::post('/', 'ItemsController@save');
Route::get('items/{id}/update', 'ItemsController@update');
Route::get('items/{id}', 'ItemsController@delete');

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

Route::get('/{id}/edit', 'ClientesController@edit');
Route::get('/{id}/delete', 'ClientesController@destroy');
Route::patch('/{id}/update', 'ClientesController@update');
Route::post('/create', 'ClientesController@create');

Route::post('/{id}/ordem/new', 'OrdensController@store');
Route::get('/{id}/delete/ordem', 'OrdensController@destroy');
Route::get('/{ordem}/ordemEdit', 'OrdensController@edit');
Route::patch('/{ordem}/ordemUpdate', 'OrdensController@update');

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');

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

Route::get('/', 'HomeController@index');
Route::get('post/{id}', 'HomeController@singlePost')->name('singlePost');
Route::get('category/{id}', 'HomeController@categoryPost')->name('categoryPost');
Route::get('search', 'HomeController@search')->name('search');

Auth::routes();

Route::get('admin','Admin\AdminController@index');
//Route::resource('categories','Admin\CategoryController');
Route::get('categories/create','Admin\CategoryController@create');
Route::post('categories-store','Admin\CategoryController@store');
Route::get('categories','Admin\CategoryController@index');
Route::get('categories/{id}','Admin\CategoryController@edit');
Route::put('categories-up/{id}','Admin\CategoryController@update');
Route::delete('categories-delete/{id}','Admin\CategoryController@destroy');

//post route
Route::resource('posts','Admin\PostController');

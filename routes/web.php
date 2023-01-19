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

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
Route::get('post/{id}', [HomeController::class,'singlePost'])->name('singlePost');
Route::get('category/{id}', [HomeController::class,'categoryPost'])->name('categoryPost');
Route::get('search', [HomeController::class,'search'])->name('search');

Auth::routes();

Route::get('admin',[AdminController::class,'index']);
//Route::resource('categories','Admin\CategoryController');
Route::get('categories/create',[CategoryController::class,'create']);
Route::post('categories-store',[CategoryController::class,'store']);
Route::get('categories',[CategoryController::class,'index']);
Route::get('categories/{id}',[CategoryController::class,'edit']);
Route::put('categories-up/{id}',[CategoryController::class,'update']);
Route::delete('categories-delete/{id}',[CategoryController::class,'destroy']);

// tags
Route::resource('/tags', 'TagController', ['except' => ['show']]);
Route::resource('/comments', 'CommentController', ['only' => ['index', 'destroy']]);

//post route
Route::resource('posts','\App\Http\Controllers\Admin\PostController');

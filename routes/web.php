<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('post/{id}', [HomeController::class, 'singlePost'])->name('singlePost');
Route::get('category/{id}', [HomeController::class, 'categoryPosts'])->name('category.posts');
Route::get('search', [HomeController::class, 'search'])->name('search');
Route::post('comment/{post}', [HomeController::class, 'comment'])->name('comment.save')->middleware('auth');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('categories', CategoryController::class);
    Route::resource('/tags', 'TagController', ['except' => ['show']]);
    Route::resource('/comments', 'CommentController', ['only' => ['index', 'destroy']]);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
});

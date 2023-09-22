<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('post/{id}', [HomeController::class, 'singlePost'])->name('singlePost');
Route::get('category-posts/{id}', [HomeController::class, 'categoryPosts'])->name('category.posts');
Route::get('tag-posts/{id}', [HomeController::class, 'tagPosts'])->name('tag.posts');
Route::get('search', [HomeController::class, 'search'])->name('search');
Route::post('comment/{post}', [HomeController::class, 'comment'])->name('comment.save')->middleware('auth');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('categories', CategoryController::class);
    Route::resource('/tags', 'TagController', ['except' => ['show']]);
    Route::resource('/comments', 'CommentController', ['only' => ['index', 'destroy']]);
    Route::resource('users', UserController::class);
    Route::get('user-ban-unban/{id}/{status}', 'UserController@banUnban')->name('user.banUnban');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('posts', PostController::class);
    // profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile-update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('change-password', [ProfileController::class, 'password'])->name('password.index');
    Route::put('update-password', [ProfileController::class, 'updatePassword'])->name('password.update');
});

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

//Category/Tag
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

//Posts
Route::resource('posts', PostController::class)->except('show')->names('admin.posts');

//Permisos (Users)
Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('admin.users');
Route::resource('roles', RoleController::class)->names('admin.roles');

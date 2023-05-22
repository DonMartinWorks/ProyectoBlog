<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

//Category
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('tags', TagController::class)->names('admin.tags');

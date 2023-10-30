<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
  Route::get('/', [MainController::class, 'index'])->name('admin_main');



  Route::group(['prefix' => 'user'], function () {
    Route::get('/', [User\IndexController::class, 'index'])->name('admin_user_index');
    Route::get('/create', [User\CreateController::class, 'create'])->name('admin_user_create');
    Route::post('/', [User\StoreController::class, 'store'])->name('admin_user_store');
    Route::get('/{user}', [User\ShowController::class, 'show'])->name('admin_user_show');
    Route::get('/{user}/edit', [User\EditController::class, 'edit'])->name('admin_user_edit');
    Route::patch('/{user}', [User\UpdateController::class, 'update'])->name('admin_user_update');
    Route::delete('/{user}', [User\DeleteController::class, 'delete'])->name('admin_user_delete');
  });
  Route::group(['prefix' => 'category'], function () {
    Route::get('/', [Category\IndexController::class, 'index'])->name('admin_category_index');
    Route::get('/create', [Category\CreateController::class, 'create'])->name('admin_category_create');
    Route::post('/', [Category\StoreController::class, 'store'])->name('admin_category_store');
    Route::get('/{category}', [Category\ShowController::class, 'show'])->name('admin_category_show');
    Route::get('/{category}/edit', [Category\EditController::class, 'edit'])->name('admin_category_edit');
    Route::patch('/{category}', [Category\UpdateController::class, 'update'])->name('admin_category_update');
    Route::delete('/{category}', [Category\DeleteController::class, 'delete'])->name('admin_category_delete');
  });
  Route::group(['prefix' => 'tag'], function () {
    Route::get('/', [Tag\IndexController::class, 'index'])->name('admin_tag_index');
    Route::get('/create', [Tag\CreateController::class, 'create'])->name('admin_tag_create');
    Route::post('/', [Tag\StoreController::class, 'store'])->name('admin_tag_store');
    Route::get('/{tag}', [Tag\ShowController::class, 'show'])->name('admin_tag_show');
    Route::get('/{tag}/edit', [Tag\EditController::class, 'edit'])->name('admin_tag_edit');
    Route::patch('/{tag}', [Tag\UpdateController::class, 'update'])->name('admin_tag_update');
    Route::delete('/{tag}', [Tag\DeleteController::class, 'delete'])->name('admin_tag_delete');
  });
  Route::group(['prefix' => 'post'], function () {
    Route::get('/', [Post\IndexController::class, 'index'])->name('admin_post_index');
    Route::get('/create', [Post\CreateController::class, 'create'])->name('admin_post_create');
    Route::post('/', [Post\StoreController::class, 'store'])->name('admin_post_store');
    Route::get('/{post}', [Post\ShowController::class, 'show'])->name('admin_post_show');
    Route::get('/{post}/edit', [Post\EditController::class, 'edit'])->name('admin_post_edit');
    Route::patch('/{post}', [Post\UpdateController::class, 'update'])->name('admin_post_update');
    Route::delete('/{post}', [Post\DeleteController::class, 'delete'])->name('admin_post_delete');
  });

});

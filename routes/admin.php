<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', [MainController::class, 'index'])->name('admin_main');

   
   
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [User\IndexController::class, 'index'])->name('admin_user_index');
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
});

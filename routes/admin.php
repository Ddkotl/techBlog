<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin',[AdminMainController::class,'index'])->name('admin_main');
});

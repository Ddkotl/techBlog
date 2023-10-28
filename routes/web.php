<?php

use App\Http\Controllers\Main\AboutController;
use App\Http\Controllers\Main\BlogController;
use App\Http\Controllers\Main\CategoriesController;
use App\Http\Controllers\Main\ReitingController;
use App\Http\Controllers\Main\WelcomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::group(['namespace'=>'Main'],function(){
    Route::get('/',[WelcomeController::class,'index'])->name('welcome');
    Route::get('/about',[AboutController::class,'index'])->name('about');
    Route::get('/blog',[BlogController::class,'index'])->name('blog');
    Route::get('/categories',[CategoriesController::class,'index'])->name('categories');
    Route::get('/reiting',[ReitingController::class,'index'])->name('reiting');
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

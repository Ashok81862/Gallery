<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [SiteController::class, 'home'])->name('home')->middleware('auth');
Route::get('/',[\App\Http\Controllers\SiteController::class,'index'])->name('index');

Route::get('/{category}/gallery',[\App\Http\Controllers\SiteController::class, 'gallery'])->name('gallery');

//Admin
Route::middleware(['admin','auth'])->prefix('/admin')->name('admin.')->group(function() {
    Route::get('/',[\App\Http\Controllers\Admin\AdminController::class, 'index']);

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    Route::get('categories/{category}/photo',[\App\Http\Controllers\Admin\CategoryController::class,'photos'])->name('categories.photos');
    Route::put('categories/{category}/photos',[\App\Http\Controllers\Admin\CategoryController::class,'addPhoto'])->name('categories.photos.store');
    Route::delete('categories/{category}/photos',[\App\Http\Controllers\Admin\CategoryController::class, 'removePhoto'])->name('categories.photos.remove');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);

});


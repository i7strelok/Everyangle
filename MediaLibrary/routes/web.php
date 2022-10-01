<?php

use Illuminate\Support\Facades\Route;

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

// Route definition...

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::get('/mediatypes', [App\Http\Controllers\MediaTypeController::class, 'index'])->name('mediatypes.index');
Route::get('/mediatypes/{mediatype}', [App\Http\Controllers\MediaTypeController::class, 'show'])->name('mediatypes.show');
Route::resource('mediaitems', App\Http\Controllers\MediaItemController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{category}/', [App\Http\Controllers\HomeController::class, 'showMediaItemsByCategory'])->name('home.categories');
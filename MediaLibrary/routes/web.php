<?php

use Illuminate\Support\Facades\Route;

// Web Route definition...

//Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//See Categories and Play Media Items 
Route::get('/home/{category}/', [App\Http\Controllers\HomeController::class, 'showMediaItemsByCategory'])->name('home.categories');
Route::get('/home/play/{mediaitem}/', [App\Http\Controllers\HomeController::class, 'playMediaItem'])->name('play');

//All routes of categories and mediaitems
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('mediaitems', App\Http\Controllers\MediaItemController::class);

//Routes of mediatypes
Route::get('/mediatypes', [App\Http\Controllers\MediaTypeController::class, 'index'])->name('mediatypes.index');
Route::get('/mediatypes/{mediatype}', [App\Http\Controllers\MediaTypeController::class, 'show'])->name('mediatypes.show');
Route::get('getcategories', [App\Http\Controllers\MediaTypeController::class, 'getCategories'])->name('getcategories');

//Routes for auth
Auth::routes();



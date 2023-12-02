<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('contact', 'PagesController@getContact');
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'getContact']);



//Route::get('about', 'PagesController@getAbout');
Route::get('/about', [App\Http\Controllers\PagesController::class, 'getAbout']);


//Route::get('/', 'PagesController@getIndex');
Route::get('/', [App\Http\Controllers\PagesController::class, 'getIndex']);



Route::resource('posts', PostController::class);


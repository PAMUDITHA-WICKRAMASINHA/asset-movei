<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopCastController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ImageController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/movie/search', [HomeController::class, 'search'])->name('search');
Route::get('/movie/language', [HomeController::class, 'language'])->name('language');
Route::get('/movie/latest', [HomeController::class, 'latest'])->name('latest');

Route::get('/get-movie/{id}', [MovieController::class, 'index'])->name('get-movie');;
Route::get('/movie/download/{id}', [MovieController::class, 'download'])->name('download');

Route::get('image/main/{filename}', [ImageController::class, 'showMainImage'])->name('showMainImage');
Route::get('image/movies/{filename}', [ImageController::class, 'showMoviesImage'])->name('showMoviesImage');
Route::get('image/directors/{filename}', [ImageController::class, 'showDirectorsImage'])->name('showDirectorsImage');
Route::get('image/topcasts/{filename}', [ImageController::class, 'showTopCastsImage'])->name('showTopCastsImage');


// Route::resource('admin', AdminController::class);
// Route::resource('directors', DirectorController::class);
// Route::resource('categories', CategoryController::class);
// Route::resource('top_casts', TopCastController::class);
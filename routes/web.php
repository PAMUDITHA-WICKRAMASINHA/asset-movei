<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\Admin\MoviesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TopCastController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\ImageController;

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

Route::get('/', [HomeController::class, 'index'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/movie/search', [HomeController::class, 'search'])->name('search');
Route::get('/movie/language', [HomeController::class, 'language'])->name('language');
Route::get('/movie/latest', [HomeController::class, 'latest'])->name('latest');

Route::get('/get-movie/{id}', [MovieController::class, 'index'])->name('get-movie');
Route::get('/movie/download/{id}', [MovieController::class, 'download'])->name('download');

Route::get('image/main/{filename}', [ImageController::class, 'showMainImage'])->name('showMainImage');
Route::get('image/movies/{filename}', [ImageController::class, 'showMoviesImage'])->name('showMoviesImage');
Route::get('image/directors/{filename}', [ImageController::class, 'showDirectorsImage'])->name('showDirectorsImage');
Route::get('image/topcasts/{filename}', [ImageController::class, 'showTopCastsImage'])->name('showTopCastsImage');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/movies-list', [MoviesController::class, 'index'])->name('admin.moviesList');


Route::get('/admin/get-all-movies', [MoviesController::class, 'get_all_movies']);
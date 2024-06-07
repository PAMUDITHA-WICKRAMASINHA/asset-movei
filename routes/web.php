<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\Admin\Auth\LoginController;
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


Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::middleware('adminLogin')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/movies-list', [MoviesController::class, 'index'])->name('admin.moviesList');
    Route::get('/admin/movies-add', [MoviesController::class, 'addMovie'])->name('admin.addMovie');
    Route::get('/admin/movies-file-add', [MoviesController::class, 'addFile'])->name('admin.addFile');
    
    Route::post('/admin/get-all-movies', [MoviesController::class, 'get_all_movies'])->name('admin.get.movie');
    Route::post('/admin/add-new-movie', [MoviesController::class, 'add_new_movie'])->name('admin.add.movie');
    Route::post('/admin/add-movie-file', [MoviesController::class, 'add_movie_file'])->name('admin.movie.file');
});
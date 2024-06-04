<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\TopCastController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\FormatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('admin/get-all-movie', [AdminController::class, 'get_all']);
Route::post('admin/add-format', [AdminController::class, 'addFormat']);
Route::resource('admin', AdminController::class);

Route::resource('directors', DirectorController::class);
Route::resource('categories', CategoryController::class);
Route::resource('top_casts', TopCastController::class);
Route::resource('languages', LanguageController::class);
Route::resource('format', FormatController::class);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopCastController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\FormatController;

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

Route::resource('admin', AdminController::class);
Route::post('admin/add-format', [AdminController::class, 'addFormat']);

Route::resource('directors', DirectorController::class);
Route::resource('categories', CategoryController::class);
Route::resource('top_casts', TopCastController::class);
Route::resource('format', FormatController::class);
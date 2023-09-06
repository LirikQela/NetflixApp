<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SerieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('category/store',[CategoryController::class,'store']);
Route::get('categories',[CategoryController::class,'index']);
Route::get('category/show/{id}',[CategoryController::class,'show']);
Route::delete('category/destroy/{id}',[CategoryController::class,'destroy']);
Route::post('category/update/{id}',[CategoryController::class,'update']);

Route::post('serie/store',[SerieController::class,'store']);
Route::get('series',[SerieController::class,'index']);
Route::get('serie/show/{id}',[SerieController::class,'show']);
Route::delete('serie/destroy/{id}',[SerieController::class,'destroy']);
Route::post('serie/update/{id}',[SerieController::class,'update']);

Route::post('movies/store',[MovieController::class,'store']);
Route::get('movies',[MovieController::class,'index']);
Route::get('movies/show/{id}',[MovieController::class,'show']);
Route::delete('movies/destroy/{id}',[MovieController::class,'destroy']);
Route::post('movies/update/{id}',[MovieController::class,'update']);

<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\News\ArticleController;
use App\Http\Controllers\API\News\AuthorsController;
use App\Http\Controllers\API\News\CategoryController;
use App\Http\Controllers\API\News\SourcesController;
use App\Http\Controllers\API\News\TagController;
use App\Http\Controllers\API\UserMainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [UserMainController::class, 'register']);
Route::post('/update', [UserMainController::class, 'update']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/tags', [TagController::class, 'list'])->middleware('auth');
Route::get('/authors', [AuthorsController::class, 'list'])->middleware('auth');
Route::get('/categories', [CategoryController::class, 'list'])->middleware('auth');
Route::get('/sources', [SourcesController::class, 'list'])->middleware('auth');
Route::get('/articles', [ArticleController::class, 'list'])->middleware('auth');

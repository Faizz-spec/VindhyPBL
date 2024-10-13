<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\api\SparepartController;
use App\Http\Controllers\api\StatusController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LisensiController;


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

Route::post('/users', [UserController::class, 'register']);
Route::post('/users/login', [UserController::class, 'login']);
Route::post('/users/logout', [UserController::class, 'logout'])->middleware(['auth:sanctum']);


Route::apiResource('/project', ProjectController::class);
Route::apiResource('/category', CategoryController::class);
Route::apiResource('/status', StatusController::class);
Route::apiResource('/sparepart', SparepartController::class);


Route::get('/v1/license/key/{key}', [SparepartController::class, 'lihat']);

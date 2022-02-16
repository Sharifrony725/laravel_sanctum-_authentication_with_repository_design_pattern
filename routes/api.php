<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class ,'index']);
    Route::post('/', [ProductController::class ,'store']);
    Route::get('/{id}', [ProductController::class ,'show']);
    Route::post('update/{id}', [ProductController::class ,'update']);
    Route::delete('/{id}', [ProductController::class ,'destroy']);

});
Route::post('register', [AuthController::class, 'register']);
Route::post('login',    [AuthController::class, 'login']);
Route::post('logout',   [AuthController::class, 'logout'])->middleware('auth:sanctum');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\PostsController; 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::post('/posts/store', [PostsController::class, 'store']);
    Route::get('/posts', [PostsController::class, 'index']);
    Route::get('/posts/{id}', [PostsController::class, 'show']);
    Route::put('/posts/{id}', [PostsController::class, 'update']);
    Route::delete('/posts/{id}', [PostsController::class, 'destroy']);
});
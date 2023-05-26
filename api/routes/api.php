<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\BlogPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'posts', 'namespace' => 'App\Http\Controllers\API'], function() {
    Route::get('', [BlogPostController::class, 'index']);
    Route::delete('/delete/{post}', [BlogPostController::class, 'destroy']);
    Route::post('/store', [BlogPostController::class, 'store']);
    Route::put('/update/{post}', [BlogPostController::class, 'update']);
    Route::patch('/update/{post}', [BlogPostController::class, 'update']);
    Route::get('/{post}', [BlogPostController::class, 'show']);
});

// Route::get('/posts', [BlogPostController::class, 'index']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('posts', [PostController::class, 'index']);
Route::get('post/{id}', [PostController::class, 'show']);
Route::post('post/store', [PostController::class, 'store']);
Route::patch('post/update/{id}', [PostController::class, 'update']);
Route::delete('post/delete/{id}', [PostController::class, 'destroy']);

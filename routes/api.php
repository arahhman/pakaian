<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [App\Http\Controllers\API\LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pakaian', [App\Http\Controllers\API\PakaianController::class, 'index']);
    Route::post('/pakaian', [App\Http\Controllers\API\PakaianController::class, 'store']);
    Route::put('/pakaian/{id}', [App\Http\Controllers\API\PakaianController::class, 'update']);
    Route::delete('/pakaian/{id}', [App\Http\Controllers\API\PakaianController::class, 'destroy']);
});
<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\NoteController;

// Authentication routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    // Task routes
    Route::apiResource('task', TaskController::class);

    // Priority routes
    Route::apiResource('priorities', PriorityController::class);

    // Note routes
    Route::apiResource('notes', NoteController::class);
    Route::apiResource('users', AuthController::class);
});

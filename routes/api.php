<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

// Authentication routes

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('users', [AuthController::class, 'index']);
Route::get('users', [AuthController::class, 'index']);
    
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{task}', [TaskController::class, 'show']);
    Route::put('/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
    Route::get('/tasks/search/{status}', [TaskController::class, 'search']);

    
    // Priority routes
    Route::get('/priorities', [PriorityController::class, 'index']);
    Route::post('/priorities', [PriorityController::class, 'store']);
    Route::get('/priorities/{priority}', [PriorityController::class, 'show']);
    Route::put('/priorities/{priority}', [PriorityController::class, 'update']);
    Route::delete('/priorities/{priority}', [PriorityController::class, 'destroy']);

    // Note routes
    Route::get('/notes', [NoteController::class, 'index']);
    Route::post('/notes', [NoteController::class, 'store']);
    Route::get('/notes/{note}', [NoteController::class, 'show']);
    Route::put('/notes/{note}', [NoteController::class, 'update']);
    Route::delete('/notes/{note}', [NoteController::class, 'destroy']);

    Route::post('logout', [AuthController::class, 'logout']);
});
   




<?php

use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/workouts', [WorkoutController::class, 'index'])->middleware('permission:access_workouts');
Route::get('/workouts/filter', [WorkoutController::class, 'filter'])->middleware('permission:filter_workouts');

Route::group(['middleware' => ['role:registered_user']], function () {
    Route::get('/workouts/create', [WorkoutController::class, 'create']);
    Route::post('/workouts', [WorkoutController::class, 'store']);
    Route::get('/workouts/{workout}/edit', [WorkoutController::class, 'edit']);
    Route::put('/workouts/{workout}', [WorkoutController::class, 'update']);
    Route::delete('/workouts/{workout}', [WorkoutController::class, 'destroy']);
    Route::post('/comments', [CommentController::class, 'store']);
    Route::put('/comments/{comment}', [CommentController::class, 'update']);
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);
    Route::get('/users/{user}', [UserController::class, 'show']);
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::delete('/workouts/{workout}', [AdminController::class, 'deleteWorkout']);
    Route::delete('/comments/{comment}', [AdminController::class, 'deleteComment']);
    Route::post('/users/{user}/block', [AdminController::class, 'blockUser']);
});
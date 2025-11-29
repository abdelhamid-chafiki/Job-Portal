<?php

use App\Http\Controllers\Api\AuthController; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\CategoryController; 


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function(Request $request) {
        return $request->user();
    });
});


Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
Route::post('/jobs', [JobController::class, 'store']); 
Route::put('/jobs/{job}', [JobController::class, 'update']); 
Route::delete('/jobs/{job}', [JobController::class, 'destroy']); 
Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store']);
});

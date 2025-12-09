<?php

use App\Http\Controllers\Api\AuthController; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\CategoryController; 


Route::group(['prefix' => 'auth'], function () {
    // User
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    // Recruiter
    Route::post('/register-recruiter', [AuthController::class, 'registerRecruiter']);
    Route::post('/login-recruiter', [AuthController::class, 'loginRecruiter']);
    // Common
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function(Request $request) {
        return $request->user();
    });

});

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/locations', [JobController::class, 'getLocations']);
Route::get('/jobs/levels', [JobController::class, 'getLevels']);
Route::get('/jobs/categories', [CategoryController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
Route::post('/jobs', [JobController::class, 'store']); 
Route::put('/jobs/{job}', [JobController::class, 'update']); 
Route::delete('/jobs/{job}', [JobController::class, 'destroy']); 
Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store']);
Route::get('/jobs/{job}/applicants', [ApplicationController::class, 'getJobApplicants']);
Route::get('/users/{userId}/applications', [ApplicationController::class, 'getUserApplications']);
});

Route::get('/jobs/{job}', [JobController::class, 'show']);

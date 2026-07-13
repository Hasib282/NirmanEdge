<?php

use App\Http\Middleware\ApiValidUser;
use Illuminate\Support\Facades\Route;

// Auth Controllers
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ForgetPasswordController;

// Crud Controllers
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\SettingsController;


// *************************************** Forget Password Controller Routes Start *************************************** //
Route::controller(ForgetPasswordController::class)->group(function () {
    Route::post('/forgotpassword', 'ForgotPassword');
    Route::post('/resetpassword',  'ResetPassword');
});

Route::post('/login', [AuthController::class, 'Login'])->middleware(['web']);

// Route::middleware(['auth:sanctum'])->group(function () {
Route::middleware(['auth:sanctum', ApiValidUser::class])->group(function () {
    Route::post('/logout', [AuthController::class, 'Logout'])->middleware(['web']);

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'Show');
        Route::post('/users', 'Insert');
        Route::put('/users', 'Update');
        Route::delete('/users', 'Delete');
    });
    
    
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/services', 'Show');
        Route::post('/services', 'Insert');
        Route::put('/services', 'Update');
        Route::delete('/services', 'Delete');
    });
    
    
    Route::controller(ProjectController::class)->group(function () {
        Route::get('/projects', 'Show');
        Route::post('/projects', 'Insert');
        Route::put('/projects', 'Update');
        Route::delete('/projects', 'Delete');
    });
    
    Route::controller(SettingsController::class)->group(function () {
        Route::get('/Settings', 'Show');
        Route::post('/Settings', 'Insert');
        Route::put('/Settings', 'Update');
        Route::delete('/Settings', 'Delete');
    });
});
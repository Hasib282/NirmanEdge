<?php

use App\Http\Middleware\ApiValidUser;
use Illuminate\Support\Facades\Route;

// Auth Controllers
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ForgetPasswordController;

// Crud Controllers
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\ProjectTypeController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\TeamCategoryController;
use App\Http\Controllers\API\TeamController;
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
    
    
    Route::controller(ProjectTypeController::class)->group(function () {
        Route::get('/projects/type', 'Show');
        Route::post('/projects/type', 'Insert');
        Route::put('/projects/type', 'Update');
        Route::delete('/projects/type', 'Delete');
        Route::get('/projects/type/get', 'GetData');
    });
    
    
    Route::controller(ProjectController::class)->group(function () {
        Route::get('/projects', 'Show');
        Route::post('/projects', 'Insert');
        Route::put('/projects', 'Update');
        Route::delete('/projects', 'Delete');
    });
    
    
    Route::controller(TeamCategoryController::class)->group(function () {
        Route::get('/teams/category', 'Show');
        Route::post('/teams/category', 'Insert');
        Route::put('/teams/category', 'Update');
        Route::delete('/teams/category', 'Delete');
        Route::get('/teams/category/get', 'GetData');
    });
    
    
    Route::controller(TeamController::class)->group(function () {
        Route::get('/teams', 'Show');
        Route::post('/teams', 'Insert');
        Route::put('/teams', 'Update');
        Route::delete('/teams', 'Delete');
    });
    
    Route::controller(SettingsController::class)->group(function () {
        Route::post('/settings', 'Insert')->name('settings.store');
    });
});
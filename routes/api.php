<?php

use App\Http\Middleware\ApiValidUser;
use App\Http\Middleware\CheckPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Auth Controllers
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ForgetPasswordController;

// Route::get('/admin', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::view('/admin', 'layouts.admin.layout')->name('admin');
// Route::view('/admin', 'admin.auth.login')->name('login');


// *************************************** Forget Password Controller Routes Start *************************************** //
Route::controller(ForgetPasswordController::class)->group(function () {
    Route::post('/forgotpassword', 'ForgotPassword');
    Route::post('/resetpassword',  'ResetPassword');
});

Route::post('/login', [AuthController::class, 'Login'])->middleware(['web']);

// Route::middleware(['auth:sanctum'])->group(function () {
Route::middleware(['auth:sanctum', ApiValidUser::class])->group(function () {
    Route::post('/logout', [AuthController::class, 'Logout'])->middleware(['web']);

});
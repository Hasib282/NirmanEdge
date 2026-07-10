<?php

use Illuminate\Support\Facades\Route;
// Middlewares
use Illuminate\Support\Facades\Artisan;
use App\Http\Middleware\ValidUser;

// Auth Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPasswordController;

// link storage
Route::get('/link', function(){
    Artisan::call('storage:link');
});


// Frontend routes
Route::view('/', 'user.home')->name('home');
Route::view('/about', 'user.about')->name('about');
Route::view('/contact-us', 'user.contactus')->name('contact-us');
Route::view('/projects', 'user.projects')->name('projects');
Route::view('/services', 'user.services')->name('services');
Route::view('/why-us', 'user.whyus')->name('why-us');


// Don't Give Access to this routes if user is not valid
Route::middleware(ValidUser::class)->group(function () {
    // *************************************** Login Controller Routes Start *************************************** //
    Route::view('/login', 'admin.auth.login')->name('login');
    Route::view('/dashboard', 'layouts.admin.layout')->name('dashboard');


    // *************************************** Forget Password Controller Routes Start *************************************** //
    Route::controller(ForgetPasswordController::class)->group(function () {
        Route::get('/forgotpassword', 'ForgotPassord')->name('forgotPassword');;
        Route::get('/resetpassword', 'ResetPassword')->name('resetPassword');;
    });

});

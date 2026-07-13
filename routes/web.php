<?php

use Illuminate\Support\Facades\Route;
// Middlewares
use Illuminate\Support\Facades\Artisan;
use App\Http\Middleware\ValidUser;

// Auth Controllers
use App\Http\Controllers\ResetPasswordController;

use App\Http\Controllers\AdminBladeController;


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
    Route::view('/login', 'admin.auth.login')->name('login');
    Route::view('/dashboard', 'layouts.admin.layout')->name('dashboard');

    // *************************************** Forget Password Controller Routes Start *************************************** //
    Route::view('/forgotpassword', 'admin.auth.forgotPassword')->name('forgotpassword');
    Route::get('/resetpassword', [ResetPasswordController::class, 'ResetPassword'])->name('resetPassword');

    Route::prefix('admin')->group(function () {
        Route::controller(AdminBladeController::class)->group(function(){
            Route::get('/users', 'Users')->name('admin.users');
            Route::get('/services', 'Services')->name('admin.services');
            Route::get('/projects', 'Projects')->name('admin.projects');
            Route::get('/settings', 'Settings')->name('admin.settings');
        });
    });
});

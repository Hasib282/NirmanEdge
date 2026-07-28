<?php

use App\Http\Controllers\AdminBladeController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;


// link storage
Route::get('/link', function(){
    Artisan::call('storage:link');
});


// Frontend routes
Route::controller(FrontendController::class)->group(function () {
    Route::get('/about', 'About')->name('about');
    Route::get('/contact-us', 'ContactUs')->name('contact-us');
    Route::get('/', 'Home')->name('home');
    Route::get('/project', 'Projects')->name('projects');
    Route::get('/project/{slug}', 'ProjectDetails')->name('project.details');
    Route::get('/services', 'Services')->name('services');
    Route::get('/why-us', 'WhyUs')->name('why-us');
});


// Don't Give Access to this routes if user is not valid
Route::middleware(ValidUser::class)->group(function () {
    Route::view('/login', 'admin.auth.login')->name('login');
    Route::view('/dashboard', 'layouts.admin.layout')->name('dashboard');

    // *************************************** Forget Password Controller Routes Start *************************************** //
    Route::view('/forgotpassword', 'admin.auth.forgotPassword')->name('forgotPassword');
    Route::get('/resetpassword', [ResetPasswordController::class, 'ResetPassword'])->name('resetPassword');

    Route::prefix('admin')->group(function () {
        Route::controller(AdminBladeController::class)->group(function(){
            Route::get('/users', 'Users')->name('admin.users');
            Route::get('/services', 'Services')->name('admin.services');
            Route::get('/projects/type', 'ProjectTypes')->name('admin.projects.type');
            Route::get('/projects', 'Projects')->name('admin.projects');
            Route::get('/teams/category', 'TeamCategory')->name('admin.teams.category');
            Route::get('/teams', 'Teams')->name('admin.teams');
            Route::get('/settings', 'Settings')->name('admin.settings');
        });
    });
});

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::view('/about', 'user.about')->name('about');
Route::view('/contact-us', 'user.contactus')->name('contact-us');
Route::view('/projects', 'user.projects')->name('projects');
Route::view('/services', 'user.services')->name('services');
Route::view('/why-us', 'user.whyus')->name('why-us');



<?php

use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
// use App\Livewire\Counter;

// Route::get('/', function () {
  
//     // return view('welcome');
//     Route::get('/counter', Counter::class);
// });

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/services', function () {
    return view('pages.services');
});
Route::get('/projects', function () {
    return view('pages.projects');
});
Route::get('/contact', function () {
    return view('pages.contact');
});



// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
Route::get('/dashboard/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');

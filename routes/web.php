<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Message;
use App\Http\Controllers\MessageExportController;
use App\Http\Middleware\SessionTimeout;
use App\Http\Controllers\AuthController;

// Public routes
Route::get('/', function () {
    return view('pages.home');
});
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/services', function () {
    return view('pages.services');
});
Route::get('/blog', function () {
    return view('pages.blog');
});
Route::get('/contact', function () {
    return view('pages.contact');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes with session timeout
Route::middleware(['auth'])->group(function () {
    Route::get('/messages', function () {
        $messages = Message::all();
        return view('admin.messages', compact('messages'));
    })->name('messages');
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
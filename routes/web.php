<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Message;
use App\Http\Controllers\MessageExportController;
use App\Http\Middleware\SessionTimeout;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;


// Public routes
Route::get('/', function () {
    return view('pages.home');
});
Route::get('/home', function () {
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
Route::get('/catering', function () {
    return view('pages.catering');
});


Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/catering', [CateringController::class, 'store'])->name('catering.store');

// Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
// Route::put('/orders/{id}/update-status', [LaporanController::class, 'updateStatus'])->name('orders.update-status');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::put('/orders/{id}/update-status', [LaporanController::class, 'updateStatus'])->name('orders.update-status');
    Route::get('/orders/{id}', [LaporanController::class, 'show']);
    Route::delete('/orders/{id}', [LaporanController::class, 'destroy']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::resource('users', UserController::class);
    
});

Route::get('/messages', function () {
    $messages = Message::all();
    return view('admin.messages', compact('messages'));
})->name('messages');

// Protected routes with session timeout
// Route::middleware(['auth'])->group(function () {
//     Route::get('/messages', function () {
//         $messages = Message::all();
//         return view('admin.messages', compact('messages'));
//     })->name('messages');
// });

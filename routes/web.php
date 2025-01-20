<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Message;
use App\Http\Controllers\MessageExportController;

// use App\Livewire\Counter;

// Route::get('/', function () {
  
//     // return view('welcome');
//     Route::get('/counter', Counter::class);
// });

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
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

Route::get('/admin/messages', function () {
    $messages = Message::all();
    return view('admin.messages', compact('messages'));
});

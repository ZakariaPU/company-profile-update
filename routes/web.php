<?php

use Illuminate\Support\Facades\Route;
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
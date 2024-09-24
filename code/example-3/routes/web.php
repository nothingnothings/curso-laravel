<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/about', function () {
//     return 'The About Page';
// });

// * Useful for APIs
Route::get('/about', function () {
    return ['foo' => 'bar'];
});

Route::get('/contact', function () {
    return view('contact');
});

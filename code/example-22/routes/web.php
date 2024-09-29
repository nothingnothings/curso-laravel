<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\JobListing;
use Illuminate\Support\Facades\Route;



/**
 * This is the route that will be used to display the home page of the application, with my introduction.
 */
// Route::get('/', function () {

//     $jobs = JobListing::all();

//     return view('home');
// });

// // * Shorthand:
// Route::view('/', 'home')->name('home');

// /**
//  * This is the route that will be used to display the jobs page of the application (index), with pagination
//  */
// Route::get('/jobs', [JobController::class, 'index']);

// /**
//  * This is the route that will be used to view the form that will be used to create a new job
//  */
// Route::get('/jobs/create', [JobController::class, 'create']);

// /**
//  * This is the route that will be used to view a single job's details
//  */
// Route::get('/jobs/{job}', [JobController::class, 'show']);

// /**
//  * This is the route that will be used to create a single job
//  */
// Route::post('/jobs', [JobController::class, 'store']);


// /**
//  * This is the route that will be used to SHOW THE FORM to edit a single job
//  */
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);


// /**
//  * This is the route that will be used to UPDATE a single job:
//  */
// Route::patch('/jobs/{job}', [JobController::class, 'update']);

// /**
//  * This is the route that will be used to DELETE a single job:
//  */
// Route::delete('/jobs/{job}/', [JobController::class, 'destroy']);

// /**
//  * This is the route that will be used to show the about page
//  */
// // Route::get('/about', function () {
// //     return view('about');
// // });

// // * Shorthand:
// Route::view('/about', 'about')->name('about');


// /**
//  * This is the route that will be used to show the contact page
//  */
// // Route::get('/contact', function () {
// //     return view('contact');
// // });

// // * Shorthand:
// Route::view('/contact', 'contact')->name('contact');






// * THIS IS THE MOST ABBREVIATED VERSION OF THE ROUTES' CODE.
Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::view('/about', 'about');

Route::resource('jobs', JobController::class);


// Auth
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

// Login (session management)
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

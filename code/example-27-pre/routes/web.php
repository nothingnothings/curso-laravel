<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use App\Models\JobListing;
use Illuminate\Support\Facades\Mail;
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



// * This is a way to TEST if the mail is working
// Route::get('/test', function() {
//     Mail::to('example@example.com')->send(new JobPosted());

//     return 'Done';
// });



// This is a way to test if the queue is working.
Route::get('/test', function() {

    // * This is how you dispatch a inline job (no dedicated class for the job itself):
    dispatch(function() {
        logger('Hello from the queue');
    })->delay(5); // * This is the delay, in seconds, for the execution (optional).


    // * This is how you dispatch a class-based job:
    // TranslateJob::dispatch()->delay(5); // * This is the delay, in seconds, for the execution (optional).


    // * This is how you dispatch a class-based job, and pass a instanced model to it, as a parameter:
    $jobListing = JobListing::first();
    dispatch(new TranslateJob($jobListing))->delay(5); // * This is the delay, in seconds, for the execution (optional).

    return 'Done';
});



// * THIS IS THE MOST ABBREVIATED VERSION OF THE ROUTES' CODE.
Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::view('/about', 'about');




Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
->middleware('auth')
// ->can('edit-job', 'job'); // * Referencing a gate
->can('edit', 'job'); // * Referencing a policy (the JobPolicy, and the 'edit' method).

Route::patch('/jobs/{job}', [JobController::class, 'update'])
->middleware('auth')
// ->can('edit-job', 'job'); // * Referencing a gate
->can('edit', 'job'); // * Referencing a policy (the JobPolicy, and the 'edit' method).

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
->middleware('auth')
// ->can('edit-job', 'job'); // * Referencing a gate
->can('edit', 'job'); // * Referencing a policy (the JobPolicy, and the 'edit' method).






// Auth
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login (session management)
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

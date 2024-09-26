<?php

use App\Models\Employer;
use App\Models\JobListing;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    $jobs = JobListing::all();


    // dd($jobs[0]); // we can access rows in the collection, as if it was an array.

    // dd($jobs[0]->salary) // We can also access column values, inside of one of those row, as if it was an object.
    // dd($jobs[0]->title) // We can also access column values, inside of one of those row, as if it was an object.


    return view('home', [
        'greeting' => 'Hello',
        'name' => 'Arthur',
        'age' => 26,
        'job' => 'programmer',
        'jobs' => $jobs
    ]);
});


Route::get('/jobs', function () {

    $jobsWithEmployers = JobListing::with('employer')->get();

    return view('jobs', [
        'jobs' => $jobsWithEmployers
    ]);
});


Route::get('/jobs/{id}', function ($id) {
    $selectedJob = JobListing::find($id);

    return view('job', [
        'job' => $selectedJob,
    ]);
});

Route::get('/about', function () {

    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

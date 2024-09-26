<?php

use App\Models\JobListing;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    $jobs = JobListing::all();


    dd($jobs);

    return view('home', [
        'greeting' => 'Hello',
        'name' => 'Arthur',
        'age' => 26,
        'job' => 'programmer',
        'jobs' => $jobs
    ]);
});


Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => JobListing::all()
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

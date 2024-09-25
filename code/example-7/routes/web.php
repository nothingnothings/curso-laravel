<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello',
        'name' => 'Arthur',
        'age' => 26,
        'job' => 'programmer',
        'jobs' => Job::fetchAll()
    ]);
});


Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::fetchAll()
    ]);
});


Route::get('/jobs/{id}', function ($id) {
    $selectedJob = Job::find($id);

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

<?php

use App\Models\JobListing;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    $jobs = JobListing::all();

    return view('home', [
        'greeting' => 'Hello',
        'name' => 'Arthur',
        'age' => 26,
        'job' => 'programmer',
        'jobs' => $jobs
    ]);
});


Route::get('/jobs', function () {
    $jobsWithEmployers = JobListing::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [ //
        'jobs' => $jobsWithEmployers
    ]);
});

Route::get('/jobs/create', function () {

    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $selectedJob = JobListing::find($id);

    return view('jobs.show', [
        'job' => $selectedJob,
    ]);
});

Route::post('/jobs', function () {


    // * Here is how you validate the fields of the request:

    request()->validate(
        [
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ],
    );



    JobListing::create([
        'title' => $requestData['title'],
        'salary' => $requestData['salary'],
        'employer_id' => 1
    ]);

    return redirect()->route('jobs.index');
});

Route::get('/about', function () {

    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


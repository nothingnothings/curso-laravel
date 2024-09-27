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

    // dd(request()->all()); // This will show us ALL THE DATA that was sent, by the post request to our server.

    // dd(request('title')); // This will show us the value of the title field, that was sent, by the post request to our server.
    // dd(request('salary')); // This will show us the value of the salary field, that was sent, by the post request to our server.


    $requestData = request()->all();

    // * Assuming that everything is valid, we will create a new JobListing entry in the database:

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


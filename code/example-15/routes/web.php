<?php

use App\Models\Employer;
use App\Models\Job;
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

    // $jobsWithEmployers = JobListing::with('employer')->get(); // ! No pagination:

    // $jobsWithEmployers = JobListing::with('employer')->paginate(3); // * Pagination applied. This is the simple/easy way of applying pagination (not good for tables with millions of rows, or 300+ pages).

    $jobsWithEmployers = JobListing::with('employer')->simplePaginate(3); // * Pagination applied. This version should be used when you have a huge table with millions of rows, 300+ pages. With this, you get only 'previous' and 'next' buttons, and no clickable page numbers.

    // $jobsWithEmployers = JobListing::with('employer')->cursorPaginate(3); // * Pagination applied. This is similar to the simplePaginate, but it uses cursors, which are faster than simplePaginate, but which lack the ability to let the user 'jump to page x', by altering the URL (which can be a deal breaker, for certain cases).

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

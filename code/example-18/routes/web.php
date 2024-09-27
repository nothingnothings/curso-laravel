<?php

use App\Models\JobListing;
use Illuminate\Support\Facades\Route;



/**
 * This is the route that will be used to display the home page of the application, with my introduction.
 */
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


/**
 * This is the route that will be used to display the jobs page of the application, with pagination
 */
Route::get('/jobs', function () {
    $jobsWithEmployers = JobListing::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [ //
        'jobs' => $jobsWithEmployers
    ]);
});

/**
 * This is the route that will be used to view the form that will be used to create a new job
 */
Route::get('/jobs/create', function () {

    return view('jobs.create');
});

/**
 * This is the route that will be used to view a single job's details
 */
Route::get('/jobs/{id}', function ($id) {
    $selectedJob = JobListing::find($id);

    return view('jobs.show', [
        'job' => $selectedJob,
    ]);
});

/**
 * This is the route that will be used to create a single job
 */
Route::post('/jobs', function () {
    // * Here is how you validate the fields of the request:
    request()->validate(
        [
            'title' => ['required', 'string', 'min:3'],
            'salary' => ['required', 'numeric']
        ],
    );


    JobListing::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect()->route('jobs.index');
});


/**
 * This is the route that will be used to SHOW THE FORM to edit a single job
 */
Route::get('/jobs/{id}/edit', function ($id) {
    $selectedJob = JobListing::find($id);

    return view('jobs.edit', [
        'job' => $selectedJob,
    ]);
});


/**
 * This is the route that will be used to UPDATE a single job:
 */
Route::patch('/jobs/{id}/', function ($id) {

    // validate
    request()->validate(
        [
        'title' => ['required', 'string', 'min:3'],
        'salary' => ['required', 'numeric']
        ]
    );
    // authorize // TODO
    // update the job
    $job = JobListing::findOrFail($id); // * this will throw an exception if the job doesn't exist

    $job->title = request('title');
    $job->salary = request('salary');

    // * Alternative way of updating the fields on the record:
    // $job->update(
    //     [
    //         'title' => request('title'),
    //         'salary' => request('salary')
    //     ]
    //     );

    // persist the job
    $job->save();

    // redirect to the job's specific page
    return redirect('/jobs/' . $job->id);
});

/**
 * This is the route that will be used to DELETE a single job:
 */
Route::delete('/jobs/{id}/', function ($id) {
    // authorize // TODO

    // delete the job
    $job = JobListing::findOrFail($id);
    $job->delete();

    // redirect
    return redirect('/jobs');
});

/**
 * This is the route that will be used to show the about page
 */
Route::get('/about', function () {

    return view('about');
});


/**
 * This is the route that will be used to show the contact page
 */
Route::get('/contact', function () {
    return view('contact');
});


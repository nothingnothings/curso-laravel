<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{



    public function index(JobListing $job)
    {
        $jobsWithEmployers = $job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [ //
            'jobs' => $jobsWithEmployers
        ]);
    }

    public function show(JobListing $job) {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store() {
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
    }

    public function edit(JobListing $job) {

        Gate::define('edit-job', function ($user, $job) {
        // 2nd layer: check if the user is the owner of the job
        return $job->employer->user->is($user); // will return a boolean, which is what the Gate needs/wants.
        });

        // *1st layer: check if the user is logged in
        if (Auth::guest()) {
            return redirect()->route('login');
        }

        Gate::authorize('edit-job',  $job);



        // * 2nd layer: check if the user is the owner of the job
        // if ($job->employer->user->isNot(Auth::user())) {
        //    abort(403);
        // }

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(JobListing $job) {

        request()->validate(
            [
            'title' => ['required', 'string', 'min:3'],
            'salary' => ['required', 'numeric']
            ]
        );

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs/' . $job->id);
    }


    public function destroy(JobListing $job) {
        $job->delete();
        return redirect('/jobs');
    }
}

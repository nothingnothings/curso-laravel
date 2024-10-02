<?php

namespace App\Http\Controllers;

use App\Models\Job;


// This is how you write an invokable controller.
class SearchController extends Controller
{
     public function __invoke() {
        // dd(request('q'));

        $jobs = Job::with(['employer', 'tags'])->where('title', 'LIKE', '%' . request('q') . '%')->get();

        // return $jobs; // Return the jobs, as JSON.

        return view('results', ['jobs' => $jobs]); // Return a view, with a list of jobs found.
     }
}

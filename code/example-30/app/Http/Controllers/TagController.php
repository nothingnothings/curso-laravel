<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke(Tag $tag) {
        // dd(request('q'));

        // Find all jobs associated with the tag:
        $jobs = $tag->jobs;

        return view('results', ['jobs' => $jobs]);
     }
}

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello',
        'name' => 'Arthur',
        'age' => 26,
        'job' => 'programmer',
        'jobs' => [
            [
                'title' => 'Director',
                'salary' => '$50,000'
            ],

            [
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'title' => 'Teacher',
                'salary' => '$40,000'
            ],
        ]
    ]);
});


Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],

            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ],
        ]
    ]);
});


Route::get('/jobs/{id}', function ($id) {

    $jobs = [
        [
            'id' => 1,
            'title' => 'Director',
            'salary' => '$50,000'
        ],

        [
            'id' => 2,
            'title' => 'Programmer',
            'salary' => '$10,000'
        ],
        [
            'id' => 3,
            'title' => 'Teacher',
            'salary' => '$40,000'
        ],
    ];

    // * Native PHP solution:
    // $selectedJob = array_filter($jobs, function ($job) use ($id) {
    //     return $job['id'] == $id;
    // });

    // * Laravel solution (with 'Arr' class and helper functions):
    $selectedJob = Arr::first($jobs, fn($job) => $job['id'] == $id);

    //  dd($selectedJob); /// 'dd' --> dump and die, kill the execution.
    return view('job', [
        'job' => $selectedJob,
    ]);
});

Route::get('/about', function () {
    // return ['foo' => 'bar'];
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

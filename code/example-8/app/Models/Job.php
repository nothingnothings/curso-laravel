<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Job
{


    public function __construct() {}


    public static function fetchAll(): array
    {

        return [
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
    }


    public static function find(int $id): ?array
    {
        $selectedJob = Arr::first(static::fetchAll(), fn($job) => $job['id'] == $id);

        if(!$selectedJob) {
            abort(404);
        }

        return $selectedJob;
    }
}

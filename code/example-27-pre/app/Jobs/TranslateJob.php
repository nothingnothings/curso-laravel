<?php

namespace App\Jobs;

use App\Models\JobListing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TranslateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public JobListing $jobListing)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        // logger('Hello from the TranslateJob');
        AI::translate($this->jobListing->description, 'spanish');
        // logger('Translating' . $this->jobListing->title . ' to Spanish');
    }
}

<?php

namespace App\Policies;

use App\Models\JobListing;
use App\Models\User;

class JobPolicy
{

    /**
     * Determine whether the user can edit the model
     */
    public function edit(User $user, JobListing $jobListing): bool
    {
        return $jobListing->employer->user->is($user); // will return a boolean, which is what the Gate needs/wants.
    }
}

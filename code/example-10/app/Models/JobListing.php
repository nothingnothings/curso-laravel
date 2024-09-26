<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class JobListing extends Model
{
    // protected $table = 'job_listings'; // * do this if you want to use a different table name (ex: model name is "Job", but table name is "job_listings")


    // * This represents 'ALL THE ATTRIBUTES THAT ARE ALLOWED TO BE MASS-ASSIGNED' (and only these attributes; attributes that are not specified here cannot be mass-assigned).
    protected $fillable = [
        'title',
        'salary',
    ];
}

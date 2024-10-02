<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\Post;

test('example', function () {
    expect(true)->toBeTrue(); // PASS
});

// test('example', function () {
//     expect(true)->toBeFalse(); // ! FAIL
// });

// it() is the SAME as test().
it('belongs to an employer', function () {

    // * AAA -> Arrange, Act, Assert


    // Arrange the world:
    $employer = Employer::factory()->create();
    $job = Job::factory()->create(['employer_id' => $employer->id]);

    // Act and Assert:
    expect($job->employer)->toBeInstanceOf(Employer::class);
});


// * A JOB can have tags:
it('can have tags', function () {

    // ARRANGE:
    $job = Job::factory()->create([
        'employer_id' => Employer::factory()->create()->id,
    ]);

    // ACT:
    $job->tag('Frontend');

    // ASSERT:
    expect($job->tags)->toHaveCount(1);
});

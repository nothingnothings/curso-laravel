<?php

namespace Database\Seeders;

use App\Models\JobListing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // * You can execute this with php artisan db:seed OR php artisan db:seed --class=DatabaseSeeder
        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
        ]);

        // * You can execute this with php artisan db:seed OR php artisan db:seed --class=DatabaseSeeder
        JobListing::factory(200)->create();


        // * You can also call other seeders, from within this general seeder, like this:
        $this->call(JobSeeder::class);
    }
}

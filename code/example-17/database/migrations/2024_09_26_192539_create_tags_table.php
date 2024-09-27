<?php

use App\Models\JobListing;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::Create('job_listing_tag', function (Blueprint $table) {
            $table->id();
            $table
            ->foreignIdFor(JobListing::class, 'job_listing_id') // * second parameter is used to define a custom name for your column, instead of 'job_id'...
            ->constrained() // Creates a constraint
            ->cascadeOnDelete(); // Deletes the associated model (job_listings_tag entry) when the parent model is deleted
            $table
            ->foreignIdFor(Tag::class)
            ->constrained()
            ->cascadeOnDelete();
            $table->timestamps();
        }
    );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listing_tag');
        Schema::dropIfExists('tags');
    }
};

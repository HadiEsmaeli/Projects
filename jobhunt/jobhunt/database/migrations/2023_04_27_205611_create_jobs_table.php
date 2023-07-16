<?php

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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->Integer('company_id');
            $table->text('title');
            $table->text('description');
            $table->text('responsibility')->nullable();
            $table->text('skill')->nullable();
            $table->text('education')->nullable();
            $table->text('benifit')->nullable();
            $table->text('deadline');
            $table->Integer('vacancy');
            $table->Integer('job_category_id');
            $table->Integer('job_location_id');
            $table->Integer('job_type_id');
            $table->Integer('job_experience_id');
            $table->Integer('job_gender_id');
            $table->Integer('job_salary_range_id');
            $table->text('map_code')->nullable();
            $table->tinyInteger('is_featured');
            $table->tinyInteger('is_urgent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

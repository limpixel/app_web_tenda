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
        Schema::create('about_teams_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('job_title');
            $table->longText('about_person');
            $table->string('linkedin_person');
            $table->string('instagram_person');
            $table->string('image_person');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_teams_sections');
    }
};

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
        Schema::create('online_class_video_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_number_id');
            $table->foreign('class_number_id')->references('id')->on('class_numbers')->onDelete('cascade');
            $table->unsignedBigInteger('class_section_id');
            $table->foreign('class_section_id')->references('id')->on('class_sections')->onDelete('cascade');
            $table->string('title');
            $table->text('video_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online_class_video_links');
    }
};

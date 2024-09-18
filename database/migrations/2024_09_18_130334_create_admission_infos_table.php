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
        Schema::create('admission_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_number_id');
            $table->foreign('class_number_id')->references('id')->on('class_numbers')->onDelete('cascade');
            $table->date('admission_start_date');
            $table->date('admission_end_date');
            $table->text('file_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_infos');
    }
};

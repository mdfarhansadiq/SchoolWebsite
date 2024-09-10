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
        Schema::create('teacher_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_acc_id');
            $table->foreign('teacher_acc_id')->references('id')->on('teacher_login_signups')->onDelete('cascade');
            $table->string('name');
            $table->text('position');
            $table->text('contact_info');
            $table->integer('years_of_experience');
            $table->text('educational_qualification');
            $table->text('teaching_subjects');
            $table->text('photo_link');
            $table->integer('active_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_infos');
    }
};

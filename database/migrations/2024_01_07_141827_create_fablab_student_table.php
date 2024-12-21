<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFablabStudentTable extends Migration
{
    public function up(): void
    {
        Schema::create('fablab_student', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fablab_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->timestamps();

            // Define foreign keys
            $table->foreign('fablab_id')->references('id')->on('fablabs')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            // Ensure unique combinations of fablab_id and student_id
            $table->unique(['fablab_id', 'student_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fablab_student');
    }
}


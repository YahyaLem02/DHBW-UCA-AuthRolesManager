<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipStudentTable extends Migration
{
    public function up(): void
    {
        Schema::create('internship_student', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('internship_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->timestamps();

            // Define foreign keys
            $table->foreign('internship_id')->references('id')->on('internships')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            // Ensure unique combinations of internship_id and student_id
            $table->unique(['internship_id', 'student_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('internship_student');
    }
}


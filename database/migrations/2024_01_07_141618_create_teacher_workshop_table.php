<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherWorkshopTable extends Migration
{
    public function up(): void
    {
        Schema::create('teacher_workshop', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id')->unsigned();
            $table->bigInteger('workshop_id')->unsigned();
            $table->timestamps();

            // Define foreign keys
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('workshop_id')->references('id')->on('workshops')->onDelete('cascade');

            // Ensure unique combinations of teacher_id and workshop_id
            $table->unique(['teacher_id', 'workshop_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teacher_workshop');
    }
}


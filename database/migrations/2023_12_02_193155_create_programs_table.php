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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id')->unsigned()->nullable()->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->integer('NB_hours');
            $table->string('course');
            $table->string('image_program')->nullable();
            $table->string('type'); // Added field to distinguish between Academic and Cultural programs
            $table->timestamps();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};

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
        Schema::create('chapter_assessments', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number');
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade');
            $table->integer('question_number');
            $table->text('question');
            $table->text('choice_1');
            $table->text('choice_2');
            $table->text('choice_3');
            $table->text('choice_4');
            $table->tinyInteger('correct_answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapter_assessments');
    }
};

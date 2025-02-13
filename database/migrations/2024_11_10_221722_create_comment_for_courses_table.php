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
        Schema::create('comment_for_courses', function (Blueprint $table) {
            $table->id();
            $table->string('content')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained();
            $table->integer('rating')->unsigned()->nullable();
            $table->string('audio')->nullable(); // Chemin du fichier audio
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('comment_for_courses')
                ->nullOnDelete(); // Si le parent est supprimé, les enfants restent
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_for_courses');
    }
};

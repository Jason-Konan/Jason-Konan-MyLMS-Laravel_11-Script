<?php

use App\Models\Quiz;
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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Quiz::class)->constrained()->onDelete('cascade');
            $table->text('content');
            $table->enum('type', ['multiple_choice', 'true_false', 'short_answer']);
            $table->string('optionA')->nullable();
            $table->string('optionB')->nullable();
            $table->string('optionC')->nullable();
            $table->string('optionD')->nullable();
            $table->string('true')->nullable();
            $table->string('false')->nullable();
            $table->enum('correct_answer', ['a', 'b', 'c', 'd', 'true', 'false'])->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};

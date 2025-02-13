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
        Schema::create('lesson_progress', function (Blueprint $table) {
            $table->id(); // ID unique pour chaque enregistrement
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Référence à l'utilisateur
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade'); // Référence à la leçon
            $table->timestamp('completed_at')->nullable(); // Date de complétion
            $table->timestamps(); // Date de création et de modification
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_progress');
    }
};

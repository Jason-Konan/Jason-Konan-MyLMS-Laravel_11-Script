<?php

use App\Models\CategoriesForCourse;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 10, 2)->default(0.00)->nullable();
            $table->string('thumbnail');
            $table->foreignIdFor(CategoriesForCourse::class)->nullable()->constrained()->nullOnDelete();
            $table->enum('level', ['beginner', 'advanced', 'intermediate']);
            $table->enum('language', ['en', 'fr', 'it', 'sp', 'ar']);
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->boolean('is_active')->default(true);
            $table->boolean('audio_enabled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id'); // Qui a acheté le cours
            $table->decimal('amount', 10, 2); // Montant total payé
            $table->decimal('tax_amount', 10, 2)->nullable(); // Taxes
            $table->decimal('revenue_amount', 10, 2)->nullable(); // Part système
            $table->string('status')->default('pending'); // Status: paid, pending, failed
            $table->string('payment_id')->nullable(); // ID Stripe ou autre
            $table->softDeletes();
            $table->timestamps();

            // Clés étrangères
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

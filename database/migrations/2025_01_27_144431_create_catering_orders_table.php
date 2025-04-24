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
        Schema::create('catering_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('email');
            $table->string('phone');
            $table->string('instagram')->nullable();
            $table->string('menu_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->json('meal_types'); // Stored as JSON to handle array of meal types
            $table->text('allergies');
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catering_orders');
    }
};
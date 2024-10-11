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
        Schema::create('event_categories', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Category name (e.g., Expo, Concert, Conference)
            $table->boolean('active')->default(1); // Active status (1 = active, 0 = inactive)
            $table->timestamps(); // Laravel timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_categories');
    }
};

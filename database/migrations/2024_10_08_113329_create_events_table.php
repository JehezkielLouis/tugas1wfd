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
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title'); // Event title
            $table->string('venue'); // Venue of the event
            $table->date('date'); // Date of the event
            $table->time('start_time'); // Start time of the event
            $table->text('description'); // Event description
            $table->string('booking_url')->nullable(); // Optional URL for event booking
            $table->string('tags'); // Tags related to the event
            $table->foreignId('organizer_id')->constrained('organizers')->onDelete('cascade'); // Foreign Key: organizer
            $table->foreignId('event_category_id')->constrained('event_categories')->onDelete('cascade'); // Foreign Key: event category
            $table->boolean('active')->default(1); // Active status (1 = active, 0 = inactive)
            $table->timestamps(); // Laravel timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

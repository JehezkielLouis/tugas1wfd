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
        Schema::create('organizers', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Name of the organizer
            $table->text('description')->nullable(); // Description, optional
            $table->string('facebook_link')->nullable(); // Facebook link, optional
            $table->string('x_link')->nullable(); // X (formerly Twitter) link, optional
            $table->string('website_link')->nullable(); // Website link, optional
            $table->boolean('active')->default(1); // Active status (1 = active, 0 = inactive)
            $table->timestamps(); // Laravel timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizers');
    }
};

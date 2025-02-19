<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booths', function (Blueprint $table) {
            $table->id();
            $table->string('booth_name')->unique();
            $table->integer('map_id');
            $table->enum('status', ['available', 'occupied', 'reserved'])->default('available');
            $table->decimal('price', 10, 2);
            $table->decimal('position_x'); // Coordinates x for the booth's position
            $table->decimal('position_y'); // Coordinates y for the booth's position
            // transform positions
            $table->decimal('transform_x')->nullable(); // Transform Coordinates x for the booth's position
            $table->decimal('transform_y')->nullable(); // Transform Coordinates y for the booth's position

            $table->text('description')->nullable();
            $table->string('booth_icon')->nullable(); // Path to the booth icon image
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booths');
    }
};

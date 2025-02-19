<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('label_name');
            $table->integer('map_id');
            $table->string('color'); // Color of the label
            $table->text('label_description')->nullable(); // Optional description of the label
            $table->decimal('position_x'); // Coordinates  x for the label's position
            $table->decimal('position_y'); // Coordinates y for the label's position

            $table->decimal('transform_x'); // transform  x for the label's position
            $table->decimal('transform_y'); // transform y for the label's position

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('labels');
    }
};

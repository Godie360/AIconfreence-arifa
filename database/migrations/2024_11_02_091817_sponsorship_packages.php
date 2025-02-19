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

        Schema::create('sponsorship_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Package name (e.g., Gold Sponsor)
            $table->decimal('price', 10, 2); // Price of the package
            $table->string('description'); // Short description
            $table->json('benefits'); // List of benefits
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorship_packages');
    }
};

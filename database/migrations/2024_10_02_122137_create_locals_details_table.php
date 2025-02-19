<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('locals_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->unique()->constrained('registrations')->onDelete('cascade');
            $table->string('nida');
            $table->string('nida_image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locals_details');
    }
}

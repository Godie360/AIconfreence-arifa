<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignerDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('foreigner_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->unique()->constrained('registrations')->onDelete('cascade');
            $table->string('country');
            $table->string('passport');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('foreigner_details');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEacDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('eac_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->unique()->constrained('registrations')->onDelete('cascade');
            $table->string('eac_country');
            $table->string('nic_nida');
            $table->string('nic_image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eac_details');
    }
}

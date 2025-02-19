<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id(); // Automatically creates an auto-incrementing primary key
            $table->string('full_name');
            $table->string('organization');
            $table->string('job_title');
            $table->string('phone');
            $table->string('email')->unique();
            $table->enum('package_type', ['foreigner', 'locals', 'eac', 'students']);
            $table->integer('invoice_number');
            $table->timestamps(); // Automatically adds created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}

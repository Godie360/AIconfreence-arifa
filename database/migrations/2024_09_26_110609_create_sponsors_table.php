<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_person');
            $table->string('logo_path')->nullable(); // Assuming you store logo paths
            $table->string(column: 'phone');
            $table->string('email');
            $table->string('sponsorship_level');
            $table->string('link');
            $table->enum('package_type', ['Gold', 'Silver', 'Bronze']);
            $table->tinyInteger('status')->default(0); //0 pending 1 approved
            $table->integer('invoice_number');
            $table->timestamps(); // This creates created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('sponsors');
    }
}

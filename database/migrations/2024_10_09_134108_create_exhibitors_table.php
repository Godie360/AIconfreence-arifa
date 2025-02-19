<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibitors', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('company_name');  // Company name
            $table->string('contact_person')->nullable();  // Full name of the exhibitor
            $table->string('job_title');  // Job title, optional
            $table->string('email')->unique();  // Exhibitor's email
            $table->string('phone')->nullable();  // Phone number
            $table->string('booth_name')->nullable();  // Booth number for the exhibitor, optional
            $table->string('location');  // Location
            $table->string('company_logo')->nullable();  // Profile image or booth image (path to file)
            $table->integer('booth_id')->nullable();
            // $table->text('description')->nullable();  // Description of their booth or exhibition
            $table->integer('map_id')->nullable();
            $table->timestamps();  // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exhibitors');
    }
}

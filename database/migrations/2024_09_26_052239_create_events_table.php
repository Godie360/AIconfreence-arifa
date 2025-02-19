<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_url', 191)->default('event_images/AI-Business-growth.png');
            $table->string('topic', 255);
            $table->date('from');
            $table->date('to');
            $table->time('start_time');
            $table->time('end_time');
            $table->longText('description');
            $table->string('documents', 255);
            $table->timestamps(); // This includes both created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

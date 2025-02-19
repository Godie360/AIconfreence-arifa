<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('students_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->unique()->constrained('registrations')->onDelete('cascade');
            $table->string('school_name');
            $table->string('registration_number');
            $table->string('student_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students_details');
    }
}

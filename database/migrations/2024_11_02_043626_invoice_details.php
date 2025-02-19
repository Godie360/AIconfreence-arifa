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
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade'); // Link to the invoice
            $table->decimal('amount_paid', 10, 2); // Amount paid in this transaction

            $table->integer('invoice_number'); // Transaction ID if applicable

            $table->unsignedBigInteger('account_number')->nullable(); //  BIGINT to handle larger values
            $table->string('account_name')->nullable(); // Transaction ID if applicable

            $table->string('transaction_id')->nullable(); // Transaction ID for reference
            $table->enum('status', ['pending', 'approved', 'scum', 'failed'])->default('pending'); // Status of the invoice
            $table->timestamps(); // Created at and updated at timestamps


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
};

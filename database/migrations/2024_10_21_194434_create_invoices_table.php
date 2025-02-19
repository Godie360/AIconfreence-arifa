<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('user_email'); // Email address of the user
            $table->integer('invoice_number'); // Transaction ID if applicable
            $table->string('invoice_type'); // Type of invoice (e.g., Participant Ticket, Exhibition Booth Fee, Sponsorship Fee)

            $table->decimal('amount', 10, 2); // Amount for the invoice


            $table->decimal('amount_paid', 10, 2); // Amount for the invoice
            $table->enum('status', ['pending', 'waiting', 'paid', 'partial_paid', 'failed'])->default('pending'); // Status of the invoice
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}

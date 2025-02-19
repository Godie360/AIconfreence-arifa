<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'invoice_number',
        'amount_paid',
        'transaction_id',
        'account_number',
        'account_name',
        'transaction_id',
        'status',
    ];

    protected $casts = [
        'amount_paid' => 'decimal:2',
    ];

    // Define the relationship with Invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}

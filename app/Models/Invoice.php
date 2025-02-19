<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'invoice_number',
        'invoice_type', //this can be ticketFee, boothFee, sponsorshipFee
        'transaction_id',
        'amount',
        'account_number',
        'account_name',
        'amount_paid',
        'status', // failed,paid, waiting,pending
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    // Define the relationship with InvoiceDetail
    public function details()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}

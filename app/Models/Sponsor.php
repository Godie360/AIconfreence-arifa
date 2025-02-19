<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $table = 'sponsors';

    protected $fillable = [
        'company_name',
        'contact_person',
        'logo_path',
        'phone',
        'email',
        'sponsorship_level',
        'link',
        'package_type',
        'invoice_number',
        'status'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_us extends Model
{
    use HasFactory;

    // Specify the correct table name
    protected $table = 'contact_us';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];
}

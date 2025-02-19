<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Specify the table if it's not the default 'events'
    protected $table = 'events';

    // Fields that are mass assignable
    protected $fillable = [
        'image_url',
        'topic',
        'from',
        'to',
        'start_time',
        'end_time',
        'description',
        'documents',
    ];

    // Casts for date and time fields
    protected $casts = [
        'from' => 'date',
        'to' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];
}

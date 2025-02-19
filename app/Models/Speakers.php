<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speakers extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow the default convention
    protected $table = 'speakers';

    // Define fillable attributes
    protected $fillable = [
        'name',
        'company',
        'title',
        'phone',
        'email',
        'location',
        'topic',
        'abstract',
        'image',
        'bio',
        'has_honor',
    ];
}

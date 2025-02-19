<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExhibitionMap extends Model
{
    use HasFactory;

    protected $fillable = [
        'map_name',
        'map_image',
    ];

    protected $casts = [
        'layout' => 'array', // Cast layout JSON to array
    ];
}

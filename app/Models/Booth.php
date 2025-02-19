<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booth extends Model
{
    use HasFactory;

    protected $fillable = [
        'booth_name',
        'map_id',
        'status',
        'price',
        'position_x', // X position of the booth on the map
        'position_y', // Y position of the booth on the map
        'transform_x', // Transform X position of the booth on the map
        'transform_y', //Transform y position of the booth on the map
        'description',
        'booth_icon',
    ];
}

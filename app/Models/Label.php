<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $table = 'labels'; // Specify the table name

    protected $fillable = [
        'label_name',
        'map_id',
        'color',
        'label_description',
        'position_x', // X position of the label on the map
        'position_y', // Y position of the label on the map
        'transform_x', // Transform X position of the booth on the map
        'transform_y', //Transform y position of the booth on the map
    ];

    // Optionally, define relationships if needed
    // public function mapLayout()
    // {
    //     return $this->belongsTo(MapLayout::class);
    // }
}

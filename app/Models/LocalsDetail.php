<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalsDetail extends Model
{
    protected $fillable = ['registration_id', 'nida', 'nida_image'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}

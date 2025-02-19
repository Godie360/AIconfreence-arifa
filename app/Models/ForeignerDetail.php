<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForeignerDetail extends Model
{
    protected $fillable = ['registration_id', 'country', 'passport'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}

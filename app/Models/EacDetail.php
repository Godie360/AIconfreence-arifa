<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EacDetail extends Model
{
    protected $fillable = ['registration_id', 'eac_country', 'nic_nida', 'nic_image'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}

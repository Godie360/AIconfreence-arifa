<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class students_details extends Model
{
    protected $fillable = ['registration_id', 'school_name', 'registration_number', 'student_id_image',];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}

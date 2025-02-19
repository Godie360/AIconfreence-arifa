<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'full_name',
        'organization',
        'job_title',
        'phone',
        'email',
        'package_type',
        'invoice_number'
    ];

    public function foreignerDetails()
    {
        return $this->hasOne(ForeignerDetail::class);
    }

    public function localsDetails()
    {
        return $this->hasOne(LocalsDetail::class);
    }

    public function eacDetails()
    {
        return $this->hasOne(EacDetail::class);
    }

    public function studentDetails()
    {
        return $this->hasOne(students_details::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'company',
        'email',
        'phone_number',
        'city',
        'joining_date',
        'image',

    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}

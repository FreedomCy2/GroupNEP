<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Protect against mass assignment
    protected $fillable = [
        'patient',
        'doctor',
        'date',
        'time',
        'status',
    ];
}

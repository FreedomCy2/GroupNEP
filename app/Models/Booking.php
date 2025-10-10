<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Protect against mass assignment
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone_number',
        'customer_joined_date',
    ];
}

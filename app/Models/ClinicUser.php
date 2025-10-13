<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicUser extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'joined_date',
    ];
}

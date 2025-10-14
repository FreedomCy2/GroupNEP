<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'patient_name',
        'symptoms',
        'reminder_date',
        'reminder_time',
        'status',
    ];
}

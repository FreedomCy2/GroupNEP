<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorTable extends Model
{
    protected $fillable = ['name', 'specialization', 'email', 'phone', 'status'];
}

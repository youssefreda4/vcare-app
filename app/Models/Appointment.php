<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable  = [
        'name',
        'email',
        'phone',
        'appointment_date',
        'patient_id',
        'doctor_id'
    ];
}

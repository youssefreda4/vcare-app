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
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use Notifiable;
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

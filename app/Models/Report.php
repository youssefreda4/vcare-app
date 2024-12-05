<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{

    public function user(){
        return $this->belongsTo(User::class,'patient_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    protected $fillable = [
        'report',
        'doctor_id',
        'patient_id'
    ];
}

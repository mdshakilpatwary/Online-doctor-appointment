<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'patient_id',
        'doctor_id',
        'doctor_schedule_id',
        'department',
        'appointment_date',
        'time',
        'payment_method',
        'payment_status',
        'fee',
        'patient_name',
        'age',
        'email',
        'phone',
        'quantity',
        'address',
        'patient_problem',
        'description',
        'appointment_rating',
        'status',
      
    ];

    function doctor(){
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
    function patient(){
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }
    function doctorSchedule(){
        return $this->belongsTo(DoctorSchedule::class, 'doctor_schedule_id', 'id');
    }



}

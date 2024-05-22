<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'department_id',
        'set_date',
        'set_time',
        'patient_qty',
        'patient_fee',
        'specialist',
        'meeting_link',
        'description',
        'status',
      
    ];

    function doctor(){
        return $this->belongsTo(User::class, 'user_id', 'id');
     }
    function department(){
        return $this->belongsTo(DoctorDepartment::class, 'department_id', 'id');
    }


}

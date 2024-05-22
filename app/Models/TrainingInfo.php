<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingInfo extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'institute',
        'specialization',
        'from_date',
        'to_date',
        'training_title',
        'training_certificate',
        'certificate_location',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


    // sepcialization
    public function getSpecializationAttribute($value){
        $specializations = json_decode(file_get_contents(public_path('data/psychology_departments.json')), true);
        $specialization = $specializations[$value] ?? 'Unknown';
        return $specialization;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'institute',
        'specialization',
        'duration',
        'passing_year',
        'edu_doc_title',
        'education_certificate',
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

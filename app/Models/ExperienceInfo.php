<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceInfo extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'org_name',
        'department',
        'from_date',
        'to_date',
        'job_status',
        'position',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

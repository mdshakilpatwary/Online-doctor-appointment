<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;
    public $timestamps = true;


    protected $fillable = [
        'doc_title',
        'license_no',
        'license_attachment',
        'license_attachment_location',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function getDocTitleAttribute($value)
    // 1=Professor Dr. ,2=Assistant Professor Dr., 3=Associate Professor Dr., 4 = Distinguished Professor Dr., 5 = Dr.
    {
        switch ($value) {
            case 1:
                return 'Professor Dr.';
            case 2:
                return 'Assistant Professor Dr.';
            case 3:
                return 'Associate Professor Dr.';
            case 4:
                return 'Distinguished Professor Dr.';
            default:
                return 'Dr.';
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function user(){
        return $this->hasOne(User::class);
    }
}

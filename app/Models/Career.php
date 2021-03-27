<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    public function schools(){
        return $this->belongsToMany(School::class, 'career_school') ->using(CareerSchool::class)
            ->withTimestamps();
    }
}

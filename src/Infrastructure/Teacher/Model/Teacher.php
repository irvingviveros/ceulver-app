<?php
declare(strict_types = 1);

namespace Infrastructure\Teacher\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\School\Model\School;
use Infrastructure\Subject\Model\Subject;

class Teacher extends Model
{
    use HasFactory;

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}

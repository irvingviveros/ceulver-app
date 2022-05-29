<?php
declare(strict_types = 1);

namespace Infrastructure\Subject\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\School\Model\School;
use Infrastructure\Teacher\Model\Teacher;

class Subject extends Model
{
    use HasFactory;

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}

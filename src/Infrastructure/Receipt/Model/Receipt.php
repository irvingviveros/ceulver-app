<?php
declare(strict_types = 1);

namespace Infrastructure\Receipt\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\Student\Model\Student;

class Receipt extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}

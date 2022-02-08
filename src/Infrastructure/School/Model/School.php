<?php

namespace Infrastructure\School\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\AcademicYear\Model\AcademicYear;
use Infrastructure\Agreement\Model\Agreement;
use Infrastructure\Career\Model\Career;
use Infrastructure\Subject\Model\Subject;
use Infrastructure\Teacher\Model\Teacher;

class School extends Model
{
    use HasFactory;

    /**
     * Get the email settings associated with the School.
     *  $school -> emailSettings
     */
    public function emailSettings()
    {
        return $this->hasOne(EmailSetting::class);
    }

    /**
     * Get the student convention associated with the School.
     *  $school -> agreements
     */
    public function agreements()
    {
        return $this->belongsToMany(Agreement::class)
            ->withTimestamps();
//            ->withPivot(['discount_price', 'discount_percentage']);
    }

    /**
     * Get those careers associated with the School.
     *  $school -> studentType
     */
    public function careers()
    {
        return $this->belongsToMany(Career::class, 'career_school')
            ->using(CareerSchool::class)
            ->withTimestamps();
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function academicYears()
    {
        return $this->hasMany(AcademicYear::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}

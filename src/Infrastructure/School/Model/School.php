<?php

namespace Infrastructure\School\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     *  $school -> studentType
     */
    public function studentConvention()
    {
        return $this->hasMany(StudentConvention::class);
    }

    /**
     * Get those careers associated with the School.
     *  $school -> studentType
     */
    public function careers(){
        return $this->belongsToMany(Career::class, 'career_school')
            ->using(CareerSchool::class)
            ->withTimestamps();
    }
}

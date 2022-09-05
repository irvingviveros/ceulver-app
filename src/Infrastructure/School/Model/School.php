<?php

namespace Infrastructure\School\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Infrastructure\EducationalSystem\Model\EducationalSystem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\AcademicYear\Model\AcademicYear;
use Infrastructure\Agreement\Model\Agreement;
use Infrastructure\Career\Model\Career;
use Infrastructure\Group\Model\Group;
use Infrastructure\Student\Model\Student;
use Infrastructure\Subject\Model\Subject;
use Infrastructure\Syllabus\Model\Syllabus;
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
     * Get the educational system associated with the school.
     *  $school -> educationalSystem
     */
    public function educationalSystem(): BelongsTo
    {
        return $this->belongsTo(EducationalSystem::class);
    }

    /**
     * Get the educational system associated with the school.
     *  $school -> groups
     */
    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    /**
     * Get the syllabi associated with the school.
     *  $school -> syllabi
     */
    public function syllabi(): HasMany
    {
        return $this->hasMany(Syllabus::class);
    }

    /**
     * Get the student convention associated with the School.
     *  $school -> agreements
     */
    public function agreements(): BelongsToMany
    {
        return $this->belongsToMany(Agreement::class)
            ->withTimestamps();
//            ->withPivot(['discount_price', 'discount_percentage']);
    }

    /**
     * Get those careers associated with the School.
     *  $school -> studentType
     */
    public function careers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Career::class, 'career_school')
            ->using(CareerSchool::class)
            ->withTimestamps();
    }

    public function subjects(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subject::class);
    }

    public function academicYears(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AcademicYear::class);
    }

    public function teachers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public function students(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Student::class);
    }
}

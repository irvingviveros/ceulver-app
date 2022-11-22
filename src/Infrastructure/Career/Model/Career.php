<?php
declare(strict_types = 1);

namespace Infrastructure\Career\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Infrastructure\School\Model\School;
use Infrastructure\Student\Model\Student;
use Infrastructure\Syllabus\Model\Syllabus;

class Career extends Model {
    use HasFactory;

    /**
     * @return BelongsToMany
     */
    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class, 'career_school') ->using(CareerSchool::class)
            ->withTimestamps();
    }

    /**
     * Get the syllabus associated with the career.
     *  $career -> syllabus
     */
    public function syllabus(): HasOne
    {
        return $this->hasOne(Syllabus::class);
    }

    /**
     * Get students associated with the career.
     *  $career -> students
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}

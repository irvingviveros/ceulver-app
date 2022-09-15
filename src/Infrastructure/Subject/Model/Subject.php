<?php
declare(strict_types = 1);

namespace Infrastructure\Subject\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Infrastructure\Cycle\Model\Cycle;
use Infrastructure\School\Model\School;
use Infrastructure\Syllabus\Model\Syllabus;
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

    /**
     * Get the syllabus associated with the subject.
     *  $subject -> syllabus
     */
    public function syllabus(): BelongsTo
    {
        return $this->belongsTo(Syllabus::class);
    }

    /**
     * Get the cycle associated with the subject.
     *  $subject -> cycle
     */
    public function cycle(): BelongsTo
    {
        return $this->belongsTo(Cycle::class);
    }
}

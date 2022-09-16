<?php
declare(strict_types = 1);

namespace Infrastructure\Teacher\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Infrastructure\School\Model\School;
use Infrastructure\Subject\Model\Subject;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Teacher extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class, 'school_id');
    }

    /**
     * Get subjects associated with the teacher.
     *  $teacher -> subjects
     */
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }
}

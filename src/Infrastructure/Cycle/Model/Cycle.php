<?php
declare(strict_types = 1);

namespace Infrastructure\Cycle\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Infrastructure\Subject\Model\Subject;
use Infrastructure\Syllabus\Model\Syllabus;

class Cycle extends Model
{
    use HasFactory;

    /**
     * Get the syllabus associated with the cycle.
     *  $cycle -> syllabus
     */
    public function syllabus(): BelongsTo
    {
        return $this->belongsTo(Syllabus::class);
    }

    /**
     * Get subjects associated with the cycle.
     *  $cycle -> subjects
     */
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}

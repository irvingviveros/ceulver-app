<?php
declare(strict_types = 1);

namespace Infrastructure\Syllabus\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Infrastructure\Career\Model\Career;
use Infrastructure\School\Model\School;

class Syllabus extends Model
{
    use HasFactory;

    /**
     * Get the school associated with the syllabus.
     *  $syllabus -> school
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Get the career associated with the syllabus.
     *  $syllabus -> career
     */
    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }
}

<?php

namespace Infrastructure\Group\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Infrastructure\EducationalSystem\Model\EducationalSystem;
use Infrastructure\School\Model\School;

class Group extends Model
{
    use HasFactory;

    /**
     * Get the school associated with the group.
     *  $group -> school
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}

<?php
declare(strict_types=1);

namespace Infrastructure\EducationalSystem\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\School\Model\School;

class EducationalSystem extends Model
{
    use HasFactory;

    /**
     * Get the school associated with the educational system.
     *  $educationalSystem -> schools
     */
    public function schools(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(School::class)
            ->withTimestamps();
    }
}

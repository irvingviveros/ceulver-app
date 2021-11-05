<?php
declare(strict_types = 1);

namespace Infrastructure\Career\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Infrastructure\School\Model\School;

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
}
<?php

namespace Infrastructure\Guardian\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Infrastructure\Student\Model\Student;

class Guardian extends Model
{
    use HasFactory;

    /**
     * Get the students associated with the guardian.
     *  $guardian -> students
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}

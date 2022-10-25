<?php
declare(strict_types = 1);

namespace Infrastructure\Scholarship\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Infrastructure\Student\Model\Student;

class Scholarship extends Model
{
    use HasFactory;

    /**
     * Get the students associated with the scholarship.
     *  $scholarship -> students
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}

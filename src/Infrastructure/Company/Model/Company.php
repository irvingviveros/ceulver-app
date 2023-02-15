<?php
declare(strict_types=1);

namespace Infrastructure\Company\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Infrastructure\School\Model\School;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get schools associated with the company.
     *
     * @return HasMany
     */
    public function schools(): HasMany
    {
        return $this->hasMany(School::class);
    }

    // Get associated educational systems from schools
    public function educationalSystems()
    {
        $educationalSystems = [];
        $schools = $this->schools;
        foreach ($schools as $school) {
            $educationalSystems[] = $school->educationalSystem->name;
        }
        return $educationalSystems;
    }
}

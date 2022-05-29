<?php
declare(strict_types = 1);

namespace Infrastructure\Agreement\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\School\Model\School;

class Agreement extends Model
{
    use HasFactory;

    /**
     * Get the school associated with the student agreement.
     *  $agreement -> school
     */
    public function schools()
    {
        return $this->belongsToMany(School::class)
            ->withTimestamps();
//            ->withPivot(['discount_price', 'discount_percentage']);
    }
}

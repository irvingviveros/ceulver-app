<?php

namespace Infrastructure\Agreement\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\School\Model\School;

class Agreement extends Model
{
    use HasFactory;

    /**
     * Get the school associated with the student type.
     *  $school -> agreement
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}

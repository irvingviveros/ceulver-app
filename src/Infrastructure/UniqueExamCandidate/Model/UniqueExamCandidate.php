<?php

namespace Infrastructure\UniqueExamCandidate\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Infrastructure\UniqueExamReceipt\Model\UniqueExamReceipt;

class UniqueExamCandidate extends Model
{
    use HasFactory;

    /**
     * Get the receipts associated with the unique exam candidate.
     *  $uniqueExamCandidate -> receipts
     */
    public function receipts(): HasMany
    {
        return $this->hasMany(UniqueExamReceipt::class);
    }
}

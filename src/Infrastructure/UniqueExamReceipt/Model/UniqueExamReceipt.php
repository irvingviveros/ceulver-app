<?php

namespace Infrastructure\UniqueExamReceipt\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Infrastructure\Receipt\Model\Receipt;
use Infrastructure\Student\Model\Student;
use Infrastructure\UniqueExamCandidate\Model\UniqueExamCandidate;

class UniqueExamReceipt extends Model
{
    use SoftDeletes;

    public function uniqueExamCandidate(): BelongsTo
    {
        return $this->belongsTo(UniqueExamCandidate::class);
    }

    /**
     * Get the receipt info associated with the receipt.
     *  $receiptUniqueExamCandidate -> $receipt
     */
    public function receipt(): BelongsTo
    {
        return $this->belongsTo(Receipt::class);
    }
}

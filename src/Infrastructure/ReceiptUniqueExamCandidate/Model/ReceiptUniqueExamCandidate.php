<?php

namespace Infrastructure\ReceiptUniqueExamCandidate\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Infrastructure\Receipt\Model\Receipt;
use Infrastructure\UniqueExamCandidate\Model\UniqueExamCandidate;

class ReceiptUniqueExamCandidate extends Model
{
    use HasFactory;

    /**
     * Get the candidate associated with the receipt.
     *  $receiptUniqueExamCandidate -> student
     */
    public function uniqueExamCandidate(): BelongsTo
    {
        return $this->belongsTo(UniqueExamCandidate::class);
    }

    /**
     * Get the receipt info associated with the student receipt.
     *  $receiptUniqueExamCandidate -> $receipt
     */
    public function receipt(): BelongsTo
    {
        return $this->belongsTo(Receipt::class);
    }
}

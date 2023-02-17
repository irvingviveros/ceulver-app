<?php

namespace Infrastructure\OtherReceipt\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Infrastructure\Receipt\Model\Receipt;
use Infrastructure\Student\Model\Student;

class OtherReceipt extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the student associated with the receipt.
     *  $receiptStudent -> student
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the receipt info associated with the student receipt.
     *  $otherReceipt -> $receipt
     */
    public function receipt(): BelongsTo
    {
        return $this->belongsTo(Receipt::class);
    }
}

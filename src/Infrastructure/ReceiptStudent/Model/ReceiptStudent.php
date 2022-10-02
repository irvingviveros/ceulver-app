<?php
declare(strict_types = 1);

namespace Infrastructure\ReceiptStudent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Infrastructure\Receipt\Model\Receipt;
use Infrastructure\Student\Model\Student;

class ReceiptStudent extends Model
{
    use HasFactory;

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
     *  $receiptStudent -> $receipt
     */
    public function receipt(): BelongsTo
    {
        return $this->belongsTo(Receipt::class);
    }
}

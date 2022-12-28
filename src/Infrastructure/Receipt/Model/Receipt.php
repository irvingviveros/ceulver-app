<?php
declare(strict_types = 1);

namespace Infrastructure\Receipt\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Infrastructure\StudentReceipt\Model\StudentReceipt;

class Receipt extends Model
{
    use HasFactory;

    /**
     * Get the student receipt associated with the receipt.
     *  $receipt -> studentReceipts
     */
    public function studentReceipts(): HasMany
    {
        return $this->hasMany(StudentReceipt::class);
    }
}

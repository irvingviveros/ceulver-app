<?php
declare(strict_types = 1);

namespace Infrastructure\Receipt\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;
use Infrastructure\OtherReceipt\Model\OtherReceipt;
use Infrastructure\StudentReceipt\Model\StudentReceipt;

class Receipt extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the student receipt associated with the receipt.
     *  $receipt -> studentReceipts
     */
    public function studentReceipts(): HasMany
    {
        return $this->hasMany(StudentReceipt::class);
    }

    /**
     * Get the student receipt associated with the receipt.
     *  $receipt -> studentReceipts
     */
    public function otherReceipts(): HasMany
    {
        return $this->hasMany(OtherReceipt::class);
    }
}

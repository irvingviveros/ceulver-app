<?php

namespace Infrastructure\Student\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Infrastructure\Career\Model\Career;
use Infrastructure\Guardian\Model\Guardian;
use Infrastructure\OtherReceipt\Model\OtherReceipt;
use Infrastructure\Scholarship\Model\Scholarship;
use Infrastructure\School\Model\School;
use Infrastructure\StudentReceipt\Model\StudentReceipt;
use Infrastructure\User\Model\User;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the user associated with the student.
     *  $student -> user
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the school associated with the student.
     *  $student -> school
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Get the receipts associated with the student.
     *  $student -> receipts
     */
    public function receipts(): HasMany
    {
        return $this->hasMany(StudentReceipt::class);
    }

    /**
     * Get the receipts associated with the student.
     *  $student -> receipts
     */
    public function otherReceipts(): HasMany
    {
        return $this->hasMany(OtherReceipt::class);
    }

    /**
     * Get the scholarship associated with the student.
     *  $student -> scholarship
     */
    public function scholarship(): HasOne
    {
        return $this->HasOne(Scholarship::class);
    }

    /**
     * Get the guardian associated with the student.
     *  $student -> guardian
     */
    public function guardian(): BelongsTo
    {
        return $this->belongsTo(Guardian::class);
    }

    /**
     * Get the career associated with the student.
     *  $student -> career
     */
    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }
}

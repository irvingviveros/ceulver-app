<?php

namespace Infrastructure\Student\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Infrastructure\ReceiptStudent\Model\ReceiptStudent;
use Infrastructure\Scholarship\Model\Scholarship;
use Infrastructure\School\Model\School;
use Support\Enums\GenderEnum;
use Support\Enums\MaritalStatusEnum;
use Support\Enums\SexEnum;

class Student extends Model
{
    use HasFactory;

    protected $casts = [
//        "marital_status" => MaritalStatusEnum::class,
//        "sex" => SexEnum::class,
//        "gender" => GenderEnum::class
    ];

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
        return $this->hasMany(ReceiptStudent::class);
    }

    /**
     * Get the scholarship associated with the student.
     *  $student -> scholarship
     */
    public function scholarship(): HasOne
    {
        return $this->HasOne(Scholarship::class);
    }
}

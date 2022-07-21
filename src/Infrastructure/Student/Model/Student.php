<?php

namespace Infrastructure\Student\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the student.
     *  $student -> user
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}

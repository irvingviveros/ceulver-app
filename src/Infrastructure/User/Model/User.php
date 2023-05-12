<?php

namespace Infrastructure\User\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Infrastructure\Company\Model\Company;
use Infrastructure\School\Model\School;
use Infrastructure\Student\Model\Student;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'status',
        'is_active',
        'created_by',
        'school_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the Student associated with the user.
     *  $user -> student
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the School associated with the user.
     *  $user -> school
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Get the company where the user belongs to if the user has the right permission
     * @return Company|mixed|null
     */
    public function company()
    {
//        if ($this->hasPermissionTo('see company info')) {
//            return $this->school->company;
//        }
//
//        return null;
        //TODO: fix this.

        return $this->school->company;
    }
}

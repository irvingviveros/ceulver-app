<?php
declare(strict_types = 1);

namespace Infrastructure\Teacher\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\School\Model\School;
use Infrastructure\Subject\Model\Subject;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Teacher extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function schools()
    {
        return $this->belongsToMany(School::class, 'school_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}

<?php

namespace Infrastructure\Email\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\School\Model\School;

class EmailSetting extends Model {
    use HasFactory;

    /**
     * Get the school associated with the email settings.
     *  $emailSettings -> school
     */
    public function school() {
        return $this->belongsTo(School::class);
    }

    public static function getDataTable(){
        return EmailSetting::query()
            ->select([
                'email_settings.id',
                'email_settings.mail_protocol',
                'email_settings.mail_type',
                'email_settings.status',
                'email_settings.from_name',
                'email_settings.from_address',
                'schools.school_name as school_name',
            ])
            ->join('schools', function ($join){
                $join->on('email_settings.school_id', '=', 'schools.id');
            });
    }
}
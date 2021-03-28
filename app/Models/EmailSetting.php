<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmailSetting extends Model
{
    use HasFactory;

    /**
     * Get the school associated with the email settings.
     *  $emailSettings -> school
     */
    public function school()
    {
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

    /**
     * Validation
     *  Check if the school id already exists in email settings table or not.
     * If not then insert the record and return the insertid otherwise return 0.
     *
     */
    public static function insertData($data){

        $value=DB::table('email_settings')->where('school_id', $data['school_id'])->get();
        if($value->count() == 0){
            return DB::table('email_settings')->insertGetId($data);
        }else{
            return 0;
        }
    }
}

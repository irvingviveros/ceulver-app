<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentType extends Model
{
    use HasFactory;

    /**
     * Get the school associated with the student type.
     *  $school -> studentType
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Validation
     *  Check if school name already exists in schools table or not.
     * If not then insert the record and return the insertid otherwise return 0.
     *
     */
    public static function insertData($data){

        $value=DB::table('student_types')->where('type', $data['type'])->get();
        if($value->count() == 0){
            return DB::table('student_types')->insertGetId($data);
        }else{
            return 0;
        }
    }
}

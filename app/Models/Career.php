<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Career extends Model
{
    use HasFactory;

    public function schools(){
        return $this->belongsToMany(School::class, 'career_school') ->using(CareerSchool::class)
            ->withTimestamps();
    }

        /**
     * Validation
     *  Check if school name already exists in schools table or not.
     * If not then insert the record and return the insertid otherwise return 0.
     *
     */
    public static function insertData($data){

        $value=DB::table('careers')->where('name', $data['name'])->get();
        if($value->count() == 0){
            return DB::table('careers')->insertGetId($data);
        }else{
            return 0;
        }
    }
}

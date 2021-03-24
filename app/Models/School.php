<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class School extends Model
{
    use HasFactory;

    public static function getSchoolsData($id=null){

        return DB::table('schools')->orderBy('id', 'asc')->get();
    }

    /**
     * Validation
     *  Check if school name already exists in schools table or not.
     * If not then insert the record and return the insertid otherwise return 0.
     *
     */
    public static function insertData($data){

        $value=DB::table('schools')->where('school_name', $data['school_name'])->get();
        if($value->count() == 0){
            return DB::table('schools')->insertGetId($data);
        }else{
            return 0;
        }
    }

    public static function updateData($id,$data){
        DB::table('schools')->where('id', $id)->update($data);
    }

    public static function deleteData($id=0){
        DB::table('schools')->where('id', '=', $id)->delete();
    }
}

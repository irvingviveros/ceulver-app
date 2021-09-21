<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

class SchoolRepository {

    public function getData($id=null)
    {
        return DB::table('schools')->orderBy('id', 'asc')->get();
    }

    /**
     *  Insert data and validation
     *  Check if school name already exists in schools table or not.
     * If not then insert the record and return the insertid otherwise return 0.
     *
     */
    public function insertData($data)
    {
        $value=DB::table('schools')->where('school_name', $data['school_name'])->get();
        if($value->count() == 0)
        {
            return DB::table('schools')->insertGetId($data);
        }
        else
        {
            return 0;
        }
    }

    public function updateData($id,$data)
    {
        DB::table('schools')->where('id', $id)->update($data);
    }

    public function deleteData($id=0)
    {
        DB::table('schools')->where('id', '=', $id)->delete();
    }


}
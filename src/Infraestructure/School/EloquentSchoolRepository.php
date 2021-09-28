<?php

namespace App\src\Infraestructure\School;

use App\src\domain\School\SchoolRepository;
use Illuminate\Support\Facades\DB;

class EloquentSchoolRepository implements SchoolRepository {

    /**
     *  Insert data and validation
     *  Check if school name already exists in schools table or not.
     * If not then insert the record and return the insertid otherwise return 0.
     *
     */
    public function create($data): int {
        // TODO esta validación debe de estar en el servicio
        // verifica la existencia del registro
        $row = DB::table('schools')->where(
            'school_name', $data['school_name']
        )->get();

        if ($row->count() == 0) {
            return DB::table('schools')->insertGetId($data);
        }

        return 0;
    }
}

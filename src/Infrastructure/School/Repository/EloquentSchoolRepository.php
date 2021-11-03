<?php

namespace Infrastructure\School\Repository;

use Domain\School\Repository\SchoolRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\School\Model\School;

class EloquentSchoolRepository implements SchoolRepository {

    protected School $model;

    /**
     * EloquentSchoolRepository constructor.
     *
     * @param School $school
     */
    public function __construct(School $school)
    {
        $this->model = $school;
    }

    public function findById($id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     *  Insert data and validation
     *  Check if school name already exists in schools table or not.
     *
     */
    public function checkIfNameExists($name): bool
    {
        $row = DB::table('schools')->where('school_name', $name)->get();

        return $row->count() > 0;
    }

    public function create($data): int
    {
        return DB::table('schools')->insertGetId($data);
    }

}

<?php

namespace Infrastructure\School\Repository;

use Domain\School\Repository\SchoolRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\School\Model\School;

class EloquentSchoolRepository implements SchoolRepository {

    /**
     * @param $id
     * @return Model
     */
    public function findById($id): Model
    {
        return School::findOrFail($id);
    }

    /**
     * @param $name
     * @return bool
     */
    public function checkIfNameExists($name): bool
    {
        $row = DB::table('schools')->where('school_name', $name)->get();

        return $row->count() > 0;
    }

    /**
     * @param $data
     * @return int
     */
    public function create($data): int
    {
        return DB::table('schools')->insertGetId($data);
    }

    /**
     * @param $data
     */
    public function update($data)
    {
        $data->save();
    }

    /**
     * @param $data
     */
    public function delete($data)
    {
        $data->delete();
    }

    /**
     * @param $relation
     * @return \Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function with($relation)
    {
        return School::with($relation)->get();
    }

    /**
     * @param array|mixed|string[] $columns
     * @return \Illuminate\Database\Eloquent\Collection|School[]|EloquentSchoolRepository[]
     */
    public function all($columns = ['*'])
    {
        return School::all($columns);
    }
}

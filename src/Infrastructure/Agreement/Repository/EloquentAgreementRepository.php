<?php

namespace Infrastructure\Agreement\Repository;

use Domain\Agreement\Repository\AgreementRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Agreement\Model\Agreement;

class EloquentAgreementRepository implements AgreementRepository
{

    /**
     * @param $data
     * @return int
     */
    public function create($data): int
    {
        return DB::table('agreements')->insertGetId($data);
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function update($data)
    {
        $data->save();
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function delete($data)
    {
        $data->delete();
    }

    /**
     * @param array|mixed|string[] $columns
     * @return Agreement[]|Collection|EloquentAgreementRepository[]
     */
    public function all($columns = ['*'])
    {
        return Agreement::all($columns);
    }

    /**
     * @param $relation
     * @return \Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function with($relation)
    {
        return Agreement::with($relation)->get();
    }

    public function detachSchools(Model $agreement)
    {
        $agreement->schools()->detach();
    }

    /**
     * @param $id
     * @return Model
     */
    public function findById($id): Model
    {
        return Agreement::findOrFail($id);
    }

    /**
     *  Insert data and validation
     *  Check if agreement's name already exists in agreements table or not.
     */
    public function checkIfNameExists($name): bool
    {
        $row = DB::table('agreements')->where('name')->get();

        return $row->count() > 0;
    }

    public function getAll()
    {
        return Agreement::all();
    }
}
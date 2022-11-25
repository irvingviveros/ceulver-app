<?php

namespace Infrastructure\Teacher\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Teacher\Model\Teacher;

class EloquentTeacherRepository implements GlobalRepository
{

    public function findById($id)
    {
        return Teacher::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        $row = DB::table('teachers')->where('national_id')->get();

        return $row->count() > 0;
    }

    public function create($data): bool
    {
        return DB::table('teachers')->insert($data);
    }

    public function update($data)
    {
        $data->save();
    }

    public function delete($data)
    {
        $data->delete();
    }

    public function all($columns = ['*'])
    {
        return Teacher::all($columns);
    }

    public function with($relation)
    {
        return Teacher::with($relation);
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }
}

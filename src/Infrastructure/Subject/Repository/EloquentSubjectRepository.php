<?php

namespace Infrastructure\Subject\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Subject\Model\Subject;

class EloquentSubjectRepository implements GlobalRepository
{

    public function findById($id)
    {
        return Subject::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        $row = DB::table('subjects')->where('name')->get();

        return $row->count() > 0;
    }

    public function create($data): bool
    {
        return DB::table('subjects')->insert($data);
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
        return Subject::all($columns);
    }

    public function with($relation)
    {
        return Subject::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }
}

<?php

namespace Infrastructure\Student\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Student\Model\Student;

class EloquentStudentRepository implements GlobalRepository
{

    public function findById($id)
    {
        return Student::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        $row = DB::table('students')->where('national_id')->get();
        return $row->count() > 0;
    }

    public function create($data): int
    {
//        return Student::create($data);
        return DB::table('students')->insert($data);
    }

    public function update($data)
    {
        $data->save();
    }

    public function delete($data)
    {
        $data->delete();
    }

    public function all($columns = ['*']):Collection|array
    {
        return Student::all($columns);
    }

    public function with($relation)
    {
        return Student::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }
}

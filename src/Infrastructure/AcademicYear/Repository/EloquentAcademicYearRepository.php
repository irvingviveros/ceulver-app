<?php

namespace Infrastructure\AcademicYear\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\AcademicYear\Model\AcademicYear;

class EloquentAcademicYearRepository implements GlobalRepository
{

    public function findById($id)
    {
        return AcademicYear::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        $row = DB::table('academic_years')->where('session_code')->get();

        return $row->count() > 0;
    }

    public function create($data): bool
    {
        return DB::table('academic_years')->insert($data);
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
        return AcademicYear::all($columns);
    }

    public function with($relation)
    {
        return AcademicYear::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }
}

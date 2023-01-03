<?php
declare(strict_types = 1);

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

    public function create($data): bool
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

    public function allByEducationalSystem(string $educationalSystem): \Illuminate\Support\Collection
    {
        return DB::table('students')
            ->join('schools', 'students.school_id', '=', 'schools.id')
            ->join('educational_systems', 'schools.educational_system_id', '=', 'educational_systems.id')
            ->select('students.*')
            ->where('educational_systems.name', '=', $educationalSystem)
            ->orderBy('id')->latest()->get();
    }

    public function allBySchoolId(int $schoolId): \Illuminate\Support\Collection
    {
        return DB::table('students')
            ->join('schools', 'students.school_id', '=', 'schools.id')
            ->select('students.*')
            ->where('schools.id', '=', $schoolId)
            ->orderBy('students.id')->latest()->get();
    }

    public function with($relation)
    {
        return Student::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }

    public function where(string $column, string $operator, string $value): \Illuminate\Support\Collection
    {
        return DB::table('students')->where($column, $operator, $value)->get();
    }
}

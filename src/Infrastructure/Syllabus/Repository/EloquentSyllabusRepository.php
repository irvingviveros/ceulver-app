<?php
declare(strict_types=1);

namespace Infrastructure\Syllabus\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Syllabus\Model\Syllabus;

class EloquentSyllabusRepository implements GlobalRepository
{

    public function findById($id)
    {
        return Syllabus::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        $row = DB::table('syllabi')->where('name', $name)->get();
        return $row->count() > 0;
    }

    public function create($data): int
    {
        return DB::table('syllabi')->insertGetId($data);
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
        return Syllabus::all($columns);
    }

    public function with($relation)
    {
        return Syllabus::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }
}

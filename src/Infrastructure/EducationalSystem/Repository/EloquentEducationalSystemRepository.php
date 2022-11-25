<?php

namespace Infrastructure\EducationalSystem\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\EducationalSystem\Model\EducationalSystem;

class EloquentEducationalSystemRepository implements GlobalRepository
{

    public function findById($id)
    {
        return EducationalSystem::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        $row = DB::table('educational_systems')->where('name')->get();

        return $row->count() > 0;
    }

    public function create($data): bool
    {
        return DB::table('educational_systems')->insert($data);
    }

    public function update($data)
    {
        $data->save();
    }

    public function delete($data)
    {
        $data->delete();
    }

    public function all($columns = ['*']): Collection|array
    {
        return EducationalSystem::all($columns);
    }

    public function with($relation)
    {
        return EducationalSystem::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }
}

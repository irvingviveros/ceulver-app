<?php
declare(strict_types=1);

namespace Infrastructure\Guardian\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Guardian\Model\Guardian;

class EloquentGuardianRepository implements GlobalRepository
{

    public function findById($id)
    {
        return Guardian::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
         return false;
    }

    public function create($data): bool
    {
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

    public function all($columns = ['*']): Collection|array
    {
        return Guardian::all($columns);
    }

    public function with($relation)
    {
        return Guardian::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }
}

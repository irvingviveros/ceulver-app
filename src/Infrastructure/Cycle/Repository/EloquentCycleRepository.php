<?php
declare(strict_types=1);

namespace Infrastructure\Cycle\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Cycle\Model\Cycle;

class EloquentCycleRepository implements GlobalRepository
{

    public function findById($id)
    {
        return Cycle::query()->findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        $row = DB::table('cycles')->where('name', $name)->get();
        return $row->count() > 0;
    }

    public function create($data): bool
    {
        return DB::table('cycles')->insert($data);
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
        return Cycle::all($columns);
    }

    public function with($relation)
    {
        return Cycle::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }

    public function where($column, $id): Collection|array
    {
        return Cycle::query()->where($column, $id)->get();
    }
}

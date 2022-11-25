<?php
declare(strict_types=1);

namespace Infrastructure\Group\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Group\Model\Group;

class EloquentGroupRepository implements GlobalRepository
{

    public function findById($id)
    {
        return Group::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        $row = DB::table('groups')->where('name', $name)->get();
        return $row->count() > 0;
    }

    public function create($data): bool
    {
        return DB::table('groups')->insert($data);
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
        return Group::all($columns);
    }

    public function with($relation, )
    {
        return Group::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }
}

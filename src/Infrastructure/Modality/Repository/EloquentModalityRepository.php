<?php

namespace Infrastructure\Modality\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Modality\Model\Modality;

class EloquentModalityRepository implements GlobalRepository
{

    public function findById($id)
    {
        return Modality::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        $row = DB::table('modalities')->where('name')->get();

        return $row->count() > 0;
    }

    public function create($data): bool
    {
        return DB::table('modalities')->insert($data);
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
        return Modality::all($columns);
    }

    public function with($relation)
    {
        return Modality::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }
}

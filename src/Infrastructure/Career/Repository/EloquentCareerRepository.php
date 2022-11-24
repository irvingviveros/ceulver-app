<?php
declare(strict_types = 1);

namespace Infrastructure\Career\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Career\Model\Career;

class EloquentCareerRepository implements GlobalRepository {

    /**
     * @param $id
     * @return Model
     */
    public function findById($id): Model
    {
        return Career::query()->findOrFail($id);
    }

    /**
     * @param $name
     * @return bool
     */
    public function checkIfNameExists($name): bool
    {
        $row = DB::table('careers')->where('name', $name)->get();
        return $row->count() > 0;
    }

    /**
     * @param $data
     * @return bool
     */
    public function create($data): bool
    {
        return DB::table('careers')->insertGetId($data);
    }

    /**
     * @param $data
     */
    public function update($data)
    {
        $data->save();
    }

    /**
     * @param $data
     */
    public function delete($data)
    {
        $data->delete();
    }

    public function all($columns = ['*'])
    {
        return Career::all($columns);
    }

    public function with($relation)
    {
        return Career::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }

    public function orderBy(string $column, ?string $direction = 'asc'): \Illuminate\Support\Collection
    {
        return Career::orderBy($column, $direction)->get();
    }
}

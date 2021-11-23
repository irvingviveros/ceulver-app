<?php
declare(strict_types = 1);

namespace Infrastructure\Career\Repository;

use Domain\Career\Repository\CareerRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Career\Model\Career;

class EloquentCareerRepository implements CareerRepository {

    /**
     * @param $data
     * @return int
     */
    public function create($data): int
    {
        return DB::table('careers')->insertGetId($data);
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
     * @param $id
     * @return Model
     */
    public function findById($id): Model
    {
        return Career::findOrFail($id);
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

    public function getAll()
    {
        return Career::all();
    }
}
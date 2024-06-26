<?php
declare(strict_types = 1);

namespace Infrastructure\School\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Infrastructure\School\Model\School;

class EloquentSchoolRepository implements GlobalRepository {

    /**
     * @param $id
     * @return Model
     */
    public function findById($id): Model
    {
        return School::findOrFail($id);
    }

    /**
     * @param $name
     * @return bool
     */
    public function checkIfNameExists($name): bool
    {
        $row = DB::table('schools')->where('school_name', $name)->get();

        return $row->count() > 0;
    }

    /**
     * @param $data
     * @return bool
     */
    public function create($data): bool
    {
        return DB::table('schools')->insert($data);
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
        return School::all($columns);
    }

    public function with($relation)
    {
        return School::with($relation)->get();
    }

    public function where($column, $operator = null, $value = null, string $boolean = 'and')
    {
        return DB::table('schools')->where($column, $operator, $value, $boolean)->get();
    }

    public function allByEducationalSystem(string $educationalSystem): \Illuminate\Support\Collection
    {
        return DB::table('schools')
            ->join('educational_systems', 'schools.educational_system_id', '=', 'educational_systems.id')
            ->select('schools.*')
            ->where('educational_systems.name', '=', $educationalSystem)
            ->orderBy('id')->latest()->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }

    public function orderBy(string $column, ?string $direction = 'asc')
    {
        return School::orderBy($column, $direction)->get();
    }

    public function findByCompany(int $companyId, string $educationalSystem)
    {
        return DB::table('schools')
            ->join('educational_systems', 'schools.educational_system_id', '=', 'educational_systems.id')
            ->join('companies', 'schools.company_id', '=', 'companies.id')
            ->select('schools.*')
            ->where('companies.id', '=', $companyId)
            ->where('educational_systems.name', '=', $educationalSystem)
            ->first();
    }
}

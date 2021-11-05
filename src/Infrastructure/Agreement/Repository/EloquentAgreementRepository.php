<?php

namespace Infrastructure\Agreement\Repository;

use Domain\Agreement\Repository\AgreementRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Agreement\Model\Agreement;

class EloquentAgreementRepository implements AgreementRepository
{
    /**
     * @var Agreement
     */
    protected Agreement $model;

    /**
     * EloquentSchoolRepository constructor.
     *
     * @param Agreement $agreement
     */
    public function __construct(Agreement $agreement)
    {
        $this->model = $agreement;
    }

    /**
     * @param $id
     * @return Model
     */
    public function findById($id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     *  Insert data and validation
     *  Check if agreement's name already exists in agreements table or not.
     */
    public function checkIfNameExists($name): bool
    {
        $row = DB::table('agreements')->where('agreement_name')->get();

        return $row->count() > 0;
    }

    /**
     * @param $data
     * @return int
     */
    public function create($data): int
    {
        return DB::table('agreements')->insertGetId($data);
    }
}
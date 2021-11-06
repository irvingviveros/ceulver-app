<?php
declare(strict_types = 1);

namespace Domain\Agreement\Repository;

interface AgreementRepository {

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @param $name
     * @return bool
     */
    public function checkIfNameExists($name): bool;

    /**
     * @param $data
     * @return int
     */
    public function create($data): int;

    /**
     * @param $data
     * @return mixed
     */
    public function update($data);

    /**
     * @param $data
     * @return mixed
     */
    public function delete($data);

    /**
     * Get all the models from the database.
     *
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = ['*']);
}
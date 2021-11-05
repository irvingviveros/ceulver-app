<?php
declare(strict_types = 1);

namespace Domain\School\Repository;

interface SchoolRepository {

    public function findById($id);

    public function checkIfNameExists($name): bool;

    public function create($data): int;

    public function update($data);

    public function delete($data);

    /**
     * Get all the models from the database.
     *
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = ['*']);
}
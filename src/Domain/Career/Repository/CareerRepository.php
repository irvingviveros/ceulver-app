<?php
declare(strict_types = 1);

namespace Domain\Career\Repository;

interface CareerRepository {

    public function create($data);

    public function checkIfNameExists($name): bool;

    public function findById($id);

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
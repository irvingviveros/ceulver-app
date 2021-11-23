<?php
declare(strict_types=1);

namespace Domain\Career\Repository;

interface CareerRepository
{
    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $name
     * @return bool
     */
    public function checkIfNameExists($name): bool;

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

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
     * @return mixed
     */
    public function getAll();
}
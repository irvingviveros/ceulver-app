<?php
declare(strict_types = 1);

namespace Domain\School\Repository;

interface SchoolRepository {

    public function findById($id);

    public function checkIfNameExists($name): bool;

    public function create($data): int;

}
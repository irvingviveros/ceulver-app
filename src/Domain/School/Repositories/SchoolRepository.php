<?php
declare(strict_types = 1);

namespace Domain\School\Repositories;

interface SchoolRepository {

    public function create($data): int;
}
<?php
declare(strict_types = 1);

namespace App\src\Domain\School;

interface SchoolRepository {

    public function create($data): int;
}
<?php
declare(strict_types = 1);

namespace App\src\domain\school;

interface SchoolRepository {

    public function create($data): int;
}
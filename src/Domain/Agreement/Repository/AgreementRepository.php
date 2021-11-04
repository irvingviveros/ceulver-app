<?php
declare(strict_types=1);

namespace Domain\Agreement\Repository;

interface AgreementRepository
{
    public function findById($id);

    public function checkIfNameExists($name): bool;

    public function create($data): int;
}
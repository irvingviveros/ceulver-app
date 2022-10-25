<?php
declare(strict_types=1);

namespace Domain\Student\Actions;

class CreateFullName
{
    public static function execute(
        string $first_name,
        string $paternal_surname,
        ?string $maternal_surname): string
    {
        return "{$first_name} {$paternal_surname} {$maternal_surname}";
    }
}

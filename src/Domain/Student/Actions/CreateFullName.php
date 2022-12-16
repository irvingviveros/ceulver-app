<?php
declare(strict_types=1);

namespace Domain\Student\Actions;

class CreateFullName
{
    public static function ByFirstName(
        string $first_name,
        string $paternal_surname,
        ?string $maternal_surname): string
    {
        return "{$first_name} {$paternal_surname} {$maternal_surname}";
    }

    public static function ByPaternalSurname(
        string $first_name,
        string $paternal_surname,
        ?string $maternal_surname): string
    {
        return "{$paternal_surname} {$maternal_surname} {$first_name}";
    }
}

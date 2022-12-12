<?php
declare(strict_types=1);

namespace Domain\StudentReceipt\Actions;

use DateTime;

class DateToLatinAmericaFormat
{
    public static function execute(string $date): string
    {
        $myDateTime = DateTime::createFromFormat('Y-m-d', $date);
        return $myDateTime->format("d/m/Y ");
    }
}

<?php
declare(strict_types=1);

namespace Domain\StudentReceipt\Actions;

use DateTime;

class DateToLatinAmericaFormat
{
    /**
     * Format date Y-m-d H:i:s to d-m-y H:i
     * @param string $date
     * @return string
     */
    public static function execute(string $date): string
    {
        $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $myDateTime->format("d-m-Y H:i");
    }
}

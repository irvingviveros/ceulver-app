<?php
declare(strict_types=1);

namespace Domain\Student\Actions;

use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

class CalculateAge
{
    public static function execute(Carbon $birth_date): int
    {
        // Return the difference in years
        return $birth_date->diffInYears(Carbon::now());
    }
}

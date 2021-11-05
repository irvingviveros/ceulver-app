<?php

namespace Domain\Career\Entity;

use Carbon\Carbon;

class CareerEntity
{
    private string $career_name;
    private string $enrollment;
    private Carbon $opening_date;

    /**
     * @return string
     */
    public function getCareerName(): string
    {
        return $this->career_name;
    }

    /**
     * @param string $career_name
     */
    public function setCareerName(string $career_name): void
    {
        $this->career_name = $career_name;
    }

    /**
     * @return string
     */
    public function getEnrollment(): string
    {
        return $this->enrollment;
    }

    /**
     * @param string $enrollment
     */
    public function setEnrollment(string $enrollment): void
    {
        $this->enrollment = $enrollment;
    }

    /**
     * @return Carbon
     */
    public function getOpeningDate(): Carbon
    {
        return $this->opening_date;
    }

    /**
     * @param Carbon $opening_date
     */
    public function setOpeningDate(Carbon $opening_date): void
    {
        $this->opening_date = $opening_date;
    }

}
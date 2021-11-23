<?php

namespace Domain\Career\Entity;

use Carbon\Carbon;

class CareerEntity
{
    private string $career_name;
    private string $enrollment;
    private string $opening_date;

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
     * @return string
     */
    public function getOpeningDate(): string
    {
        return $this->opening_date;
    }

    /**
     * @param string $opening_date
     */
    public function setOpeningDate(String $opening_date): void
    {
        $this->opening_date = Carbon::parse($opening_date);
    }

}
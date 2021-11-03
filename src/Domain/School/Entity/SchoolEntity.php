<?php

namespace Domain\School\Entity;

class SchoolEntity
{
    private string $school_name;
    private string $school_address;
    private string $school_email;
    private string $school_admission;

    /**
     * @return string
     */
    public function getSchoolName(): string
    {
        return $this->school_name;
    }

    /**
     * @param string $school_name
     */
    public function setSchoolName(string $school_name): void
    {
        $this->school_name = $school_name;
    }

    /**
     * @return string
     */
    public function getSchoolAddress(): string
    {
        return $this->school_address;
    }

    /**
     * @param string $school_address
     */
    public function setSchoolAddress(string $school_address): void
    {
        $this->school_address = $school_address;
    }

    /**
     * @return string
     */
    public function getSchoolEmail(): string
    {
        return $this->school_email;
    }

    /**
     * @param string $school_email
     */
    public function setSchoolEmail(string $school_email): void
    {
        $this->school_email = $school_email;
    }

    /**
     * @return string
     */
    public function getSchoolAdmission(): string
    {
        return $this->school_admission;
    }

    /**
     * @param string $school_admission
     */
    public function setSchoolAdmission(string $school_admission): void
    {
        $this->school_admission = $school_admission;
    }
}
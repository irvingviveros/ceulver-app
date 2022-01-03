<?php

namespace Domain\Subject\Entity;

use Carbon\Carbon;

class SubjectEntity
{
    private string $name;
    private string $code;
    private ?string $description;
    private Carbon $openingDate;
    private int $status;
    private int $schoolId;
    private int $teacherId;

    /**
     * @return int
     */
    public function getSchoolId(): int
    {
        return $this->schoolId;
    }

    /**
     * @param int $schoolId
     */
    public function setSchoolId(int $schoolId): void
    {
        $this->schoolId = $schoolId;
    }

    /**
     * @return int
     */
    public function getTeacherId(): int
    {
        return $this->teacherId;
    }

    /**
     * @param int $teacherId
     */
    public function setTeacherId(int $teacherId): void
    {
        $this->teacherId = $teacherId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(string $description = ""): void
    {
        $this->description = $description;
    }

    /**
     * @return Carbon
     */
    public function getOpeningDate(): Carbon
    {
        return $this->openingDate;
    }

    /**
     * @param Carbon $openingDate
     */
    public function setOpeningDate(Carbon $openingDate): void
    {
        $this->openingDate = $openingDate;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
}
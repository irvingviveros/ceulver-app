<?php
declare(strict_types=1);

namespace Domain\UniqueExamCandidate\Entity;

class UniqueExamCandidateEntity
{
    private string $first_name;
    private string $paternal_surname;
    private string $maternal_surname;
    private string $rubric;
    private int $created_by;
    private ?int $modified_by;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getPaternalSurname(): string
    {
        return $this->paternal_surname;
    }

    /**
     * @param string $paternal_surname
     */
    public function setPaternalSurname(string $paternal_surname): void
    {
        $this->paternal_surname = $paternal_surname;
    }

    /**
     * @return string
     */
    public function getMaternalSurname(): string
    {
        return $this->maternal_surname;
    }

    /**
     * @param string $maternal_surname
     */
    public function setMaternalSurname(string $maternal_surname): void
    {
        $this->maternal_surname = $maternal_surname;
    }

    /**
     * @return string
     */
    public function getRubric(): string
    {
        return $this->rubric;
    }

    /**
     * @param string $rubric
     */
    public function setRubric(string $rubric): void
    {
        $this->rubric = $rubric;
    }

    /**
     * @return int
     */
    public function getCreatedBy(): int
    {
        return $this->created_by;
    }

    /**
     * @param int $created_by
     */
    public function setCreatedBy(int $created_by): void
    {
        $this->created_by = $created_by;
    }

    /**
     * @return int|null
     */
    public function getModifiedBy(): ?int
    {
        return $this->modified_by;
    }

    /**
     * @param int|null $modified_by
     */
    public function setModifiedBy(?int $modified_by = null): void
    {
        $this->modified_by = $modified_by;
    }
}

<?php

namespace Domain\Modality\Entity;

class ModalityEntity
{
    private string $name;
    private ?string $note;
    private int $schoolId;

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
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

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
}
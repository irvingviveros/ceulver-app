<?php
declare(strict_types=1);

namespace Domain\Group\Entity;

class GroupEntity
{
    private string $name;
    private ?string $note;
    // Foreign info
    private int $school_id;

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
    public function setNote(?string $note = null): void
    {
        $this->note = $note;
    }
    /**
     * @return int
     */
    public function getSchoolId(): int
    {
        return $this->school_id;
    }

    /**
     * @param int $school_id
     */
    public function setSchoolId(int $school_id): void
    {
        $this->school_id = $school_id;
    }

}

<?php
declare(strict_types=1);

namespace Domain\Cycle\Entity;

class CycleEntity
{
    private string $name;
    private ?string $note;
    private int $syllabus_id;

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
    public function getSyllabusId(): int
    {
        return $this->syllabus_id;
    }

    /**
     * @param int $syllabus_id
     */
    public function setSyllabusId(int $syllabus_id): void
    {
        $this->syllabus_id = $syllabus_id;
    }
}

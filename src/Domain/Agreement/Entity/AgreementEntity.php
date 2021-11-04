<?php

namespace Domain\Agreement\Entity;

class AgreementEntity
{
    private string $agreement;
    private string $note;
    private int $status;

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

    /**
     * @return string
     */
    public function getAgreement(): string
    {
        return $this->agreement;
    }

    /**
     * @param string $agreement
     */
    public function setAgreement(string $agreement): void
    {
        $this->agreement = $agreement;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }
}
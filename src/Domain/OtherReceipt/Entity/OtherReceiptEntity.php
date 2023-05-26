<?php
declare(strict_types=1);

namespace Domain\OtherReceipt\Entity;

class OtherReceiptEntity
{
    private int $sheet_id;
    private ?string $sheet_acronym;
    private ?string $full_name;
    // Foreign data
    private int $receipt_id;
    private ?int $student_id;
    private ?int $school_id;
    private int $created_by;
    private int $modified_by;

    /**
     * @return int
     */
    public function getSheetId(): int
    {
        return $this->sheet_id;
    }

    /**
     * @param int $sheet_id
     * @return void
     */
    public function setSheetId(int $sheet_id): void
    {
        $this->sheet_id = $sheet_id;
    }

    /**
     * @return string|null
     */
    public function getSheetAcronym(): ?string
    {
        return $this->sheet_acronym;
    }

    /**
     * @param string|null $sheet_acronym
     */
    public function setSheetAcronym(?string $sheet_acronym = null): void
    {
        $this->sheet_acronym = $sheet_acronym;
    }

    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    /**
     * @param string|null $full_name
     */
    public function setFullName(?string $full_name): void
    {
        $this->full_name = $full_name;
    }

    /**
     * @return int
     */
    public function getReceiptId(): int
    {
        return $this->receipt_id;
    }

    /**
     * @param int $receipt_id
     */
    public function setReceiptId(int $receipt_id): void
    {
        $this->receipt_id = $receipt_id;
    }

    /**
     * @return int|null
     */
    public function getStudentId(): ?int
    {
        return $this->student_id;
    }

    /**
     * @param int|null $student_id
     */
    public function setStudentId(?int $student_id): void
    {
        $this->student_id = $student_id;
    }

    /**
     * @return int
     */
    public function getSchoolId(): ?int
    {
        return $this->school_id;
    }

    /**
     * @param int $school_id
     */
    public function setSchoolId(?int $school_id = null): void
    {
        $this->school_id = $school_id;
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
     * @return int
     */
    public function getModifiedBy(): int
    {
        return $this->modified_by;
    }

    /**
     * @param int $modified_by
     */
    public function setModifiedBy(int $modified_by): void
    {
        $this->modified_by = $modified_by;
    }
}

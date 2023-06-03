<?php
declare(strict_types=1);

namespace Domain\UniqueExamReceipt\Entity;

class UniqueExamReceiptEntity
{
    private int $receipt_id;
    private int $sheet_id;
    private int $candidate_id;
    private int $created_by;
    private int $modified_by;

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
     * @return int
     */
    public function getSheetId(): int
    {
        return $this->sheet_id;
    }

    /**
     * @param int $sheet_id
     */
    public function setSheetId(int $sheet_id): void
    {
        $this->sheet_id = $sheet_id;
    }

    /**
     * @return int
     */
    public function getCandidateId(): int
    {
        return $this->candidate_id;
    }

    /**
     * @param int $candidate_id
     */
    public function setCandidateId(int $candidate_id): void
    {
        $this->candidate_id = $candidate_id;
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

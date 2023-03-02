<?php
declare(strict_types=1);

namespace Domain\OtherReceipt\Service;

use Domain\OtherReceipt\Entity\OtherReceiptEntity;
use Illuminate\Support\Collection;
use Infrastructure\OtherReceipt\Repository\EloquentOtherReceiptRepository;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OtherReceiptService
{
    private EloquentOtherReceiptRepository $otherReceiptRepository;
    public function __construct(EloquentOtherReceiptRepository $studentReceiptRepository)
    {
        $this->otherReceiptRepository = $studentReceiptRepository;
    }

    public function getAll(): Collection|array
    {
        return $this->otherReceiptRepository->all();
    }

    public function createReceipt(OtherReceiptEntity $otherReceiptEntity, $createdBy): int
    {
        $data = array(
            'receipt_id' => $otherReceiptEntity->getReceiptId(),
            'student_id' => $otherReceiptEntity->getStudentId(),
            'created_by' => $createdBy,
            'created_at' => date_create(),
        );

        if ($this->otherReceiptRepository->create($data)) {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    public function lastSheetId(): int
    {
        return $this->otherReceiptRepository->lastSheetId();
    }

    public function getLastSheetWithAcronym(): string
    {
        $acronym = "U"; // This acronym is specific for CEULVER
        $lastSheetId = strval($this->lastSheetId()); // Converts the int id to string

        return $acronym . $lastSheetId;
    }

    public function createSheetWithAcronym(): string
    {
        $acronym = "U"; // This acronym is specific for CEULVER
        $newSheetId = $this->lastSheetId() + 1; // Converts the int id to string

        return $acronym . $newSheetId;
    }
}
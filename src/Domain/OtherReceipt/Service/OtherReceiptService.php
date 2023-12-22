<?php
declare(strict_types=1);

namespace Domain\OtherReceipt\Service;

use Domain\OtherReceipt\Entity\OtherReceiptEntity;
use Domain\Shared\Exception\ValueNotFoundException;
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

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $studentReceipt = $this->otherReceiptRepository->findById($id);

        if ($studentReceipt == null) {
            throw new ValueNotFoundException(
                "El recibo no existe"
            );
        }

        return $studentReceipt;
    }

    public function getAll(): Collection|array
    {
        return $this->otherReceiptRepository->all();
    }

    public function findOrFailWithTrashed($id)
    {
        $receipt = $this->otherReceiptRepository->findOrFailWithTrashed($id);

        if ($receipt == null) {
            throw new ValueNotFoundException(
                "El recibo no existe"
            );
        }

        return $receipt;
    }

    public function createReceipt(OtherReceiptEntity $otherReceiptEntity, $createdBy): int
    {
        $data = array(
            'sheet_id'   => $otherReceiptEntity->getSheetId(),
            'sheet_acronym' => $otherReceiptEntity->getSheetAcronym(),
            'full_name' => $otherReceiptEntity->getFullName(),
            'school_id' => $otherReceiptEntity->getSchoolId(),
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

    public function delete($id)
    {
        $otherReceipt = $this->findById($id);

        $this->otherReceiptRepository->delete($otherReceipt);
    }
}

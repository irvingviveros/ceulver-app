<?php
declare(strict_types=1);

namespace Domain\UniqueExamReceipt\Service;

use Domain\Shared\Exception\ValueNotFoundException;
use Domain\UniqueExamReceipt\Entity\UniqueExamReceiptEntity;
use Illuminate\Support\Collection;
use Infrastructure\UniqueExamReceipt\Repository\EloquentUniqueExamReceiptRepository;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UniqueExamReceiptService
{
    private EloquentUniqueExamReceiptRepository $uniqueExamReceiptRepository;

    public function __construct(EloquentUniqueExamReceiptRepository $uniqueExamReceiptRepository)
    {
        $this->uniqueExamReceiptRepository = $uniqueExamReceiptRepository;
    }

    public function getAll(): Collection|array
    {
        return $this->uniqueExamReceiptRepository->all();
    }

    public function createReceipt(UniqueExamReceiptEntity $uniqueExamReceiptEntity): int
    {
        $data = array(
            'receipt_id'                => $uniqueExamReceiptEntity->getReceiptId(),
            'sheet_id'                  => $uniqueExamReceiptEntity->getSheetId(),
            'unique_exam_candidate_id'  => $uniqueExamReceiptEntity->getCandidateId(),
            'created_by'                => $uniqueExamReceiptEntity->getCreatedBy(),
            'created_at'                => date_create(),
        );

        if ($this->uniqueExamReceiptRepository->create($data)) {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $receipt = $this->uniqueExamReceiptRepository->findById($id);

        if ($receipt == null) {
            throw new ValueNotFoundException(
                "El recibo no existe"
            );
        }

        return $receipt;
    }

    public function update($uniqueExamReceiptId, UniqueExamReceiptEntity $uniqueExamReceiptEntity, $modifiedBy)
    {
        $uniqueExamReceipt = $this->findById($uniqueExamReceiptId);

        //TODO: Busca en la bd si ya existe un registro igual

        $uniqueExamReceipt->receipt_id = $uniqueExamReceiptEntity->getReceiptId();
        $uniqueExamReceipt->sheet_id = $uniqueExamReceiptEntity->getSheetId();
        $uniqueExamReceipt->unique_exam_candidate_id = $uniqueExamReceiptEntity->getCandidateId();
        $uniqueExamReceipt->modified_by = $modifiedBy;
        $uniqueExamReceipt->updated_at = date_create();

        if (!$this->uniqueExamReceiptRepository->update($uniqueExamReceipt))
        {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    public function lastSheetId(): int
    {
        return $this->uniqueExamReceiptRepository->lastSheetId();
    }
}

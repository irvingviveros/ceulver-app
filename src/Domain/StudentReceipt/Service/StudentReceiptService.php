<?php
declare(strict_types=1);

namespace Domain\StudentReceipt\Service;

use Domain\Shared\Exception\ValueNotFoundException;
use Domain\StudentReceipt\Entity\StudentReceiptEntity;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Infrastructure\StudentReceipt\Repository\EloquentStudentReceiptRepository;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class StudentReceiptService
{
    private EloquentStudentReceiptRepository $studentReceiptRepository;

    public function __construct(EloquentStudentReceiptRepository $studentReceiptRepository)
    {
        $this->studentReceiptRepository = $studentReceiptRepository;
    }

    public function getAll(): Collection|array
    {
        return $this->studentReceiptRepository->all();
    }

    public function getAllByEducationalSystem(string $educationalSystem): Collection
    {
        return $this->studentReceiptRepository->allByEducationalSystem($educationalSystem);
    }

    public function getAllBySchoolId(int $schoolId): Collection
    {
        return $this->studentReceiptRepository->allBySchoolId($schoolId);
    }

    public function createReceipt(StudentReceiptEntity $studentReceiptEntity, $createdBy): int
    {
        $data = array(
            'receipt_id' => $studentReceiptEntity->getReceiptId(),
            'student_id' => $studentReceiptEntity->getStudentId(),
            'created_by' => $createdBy,
            'created_at' => date_create(),
        );

        if ($this->studentReceiptRepository->create($data)) {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $studentReceipt = $this->studentReceiptRepository->findById($id);

        if ($studentReceipt == null) {
            throw new ValueNotFoundException(
                "El recibo no existe"
            );
        }

        return $studentReceipt;
    }

    public function findOrFailWithTrashed($id)
    {
        return $this->studentReceiptRepository->findOrFailWithTrashed($id);
    }

    public function update($studentReceiptId, StudentReceiptEntity $studentReceiptEntity, $modifiedBy)
    {
        // Get student receipt model
        try {
            $studentReceipt = $this->studentReceiptRepository->findById($studentReceiptId);
        } catch (ModelNotFoundException $exception) {
            // Send error message to log
            Log::info($exception->getMessage());
            // Set guardian model to null
            return null;
        }

        $studentReceipt->receipt_id = $studentReceiptEntity->getReceiptId();
        $studentReceipt->student_id = $studentReceiptEntity->getStudentId();
        $studentReceipt->modified_by = $modifiedBy;
        $studentReceipt->updated_at = date_create();

        if (!$this->studentReceiptRepository->update($studentReceipt))
        {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    public function with($relation){
        return $this->studentReceiptRepository->with($relation);
    }

    /**
     * @throws ValueNotFoundException
     */
    public function delete($id)
    {
        $studentReceipt = $this->findById($id);

        $this->studentReceiptRepository->delete($studentReceipt);
    }

    public function where($column, $operator, $value): \Illuminate\Support\Collection
    {
        return $this->studentReceiptRepository->where($column, $operator, $value);
    }

    public function lastReceiptId()
    {
        return $this->studentReceiptRepository->lastReceiptId();
    }
}

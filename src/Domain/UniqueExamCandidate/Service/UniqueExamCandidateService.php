<?php
declare(strict_types=1);

namespace Domain\UniqueExamCandidate\Service;

use Domain\Shared\Exception\ValueNotFoundException;
use Domain\UniqueExamCandidate\Entity\UniqueExamCandidateEntity;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Infrastructure\UniqueExamCandidate\Repository\EloquentUniqueExamCandidateRepository;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UniqueExamCandidateService
{
    private EloquentUniqueExamCandidateRepository $candidateRepository;

    public function __construct(EloquentUniqueExamCandidateRepository $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function getAll(): Collection|array
    {
        return $this->candidateRepository->all();
    }

    public function createCandidate(UniqueExamCandidateEntity $uniqueExamCandidateEntity, $createdBy): int
    {
        $data = array(
            'first_name'        => $uniqueExamCandidateEntity->getFirstName(),
            'paternal_surname'  => $uniqueExamCandidateEntity->getPaternalSurname(),
            'maternal_surname'  => $uniqueExamCandidateEntity->getMaternalSurname(),
            'rubric'            => $uniqueExamCandidateEntity->getRubric(),
            'created_by'        => $createdBy,
            'created_at'        => date_create(),
        );

        if ($this->candidateRepository->create($data)) {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    public function createGetId(UniqueExamCandidateEntity $uniqueExamCandidateEntity): int
    {

        $data = array(
            'first_name'        => $uniqueExamCandidateEntity->getFirstName(),
            'paternal_surname'  => $uniqueExamCandidateEntity->getPaternalSurname(),
            'maternal_surname'  => $uniqueExamCandidateEntity->getMaternalSurname(),
            'rubric'            => $uniqueExamCandidateEntity->getRubric(),
            'created_by'        => $uniqueExamCandidateEntity->getCreatedBy(),
            'created_at'        => date_create(),
        );

        return $this->candidateRepository->createGetId($data);

    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $candidate = $this->candidateRepository->findById($id);

        if ($candidate == null) {
            throw new ValueNotFoundException(
                "El candidato no existe"
            );
        }

        return $candidate;
    }

    public function findOrFailWithTrashed($id)
    {
        return $this->candidateRepository->findOrFailWithTrashed($id);
    }

    public function update($candidateId, UniqueExamCandidateEntity $candidateEntity, $modifiedBy)
    {
        // Get student receipt model
        try {
            $candidate = $this->candidateRepository->findById($candidateId);
        } catch (ModelNotFoundException $exception) {
            // Send error message to log
            Log::info($exception->getMessage());
            // Set guardian model to null
            return null;
        }

        $candidate->first_name = $candidateEntity->getFirstName();
        $candidate->paternal_surname = $candidateEntity->getPaternalSurname();
        $candidate->maternal_surname = $candidateEntity->getMaternalSurname();
        $candidate->rubric = $candidateEntity->getRubric();
        $candidate->modifiedBy = $modifiedBy;
        $candidate->updated_at = date_create();

        if (!$this->candidateRepository->update($candidate))
        {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    public function with($relation){
        return $this->candidateRepository->with($relation);
    }

    /**
     * @throws ValueNotFoundException
     */
    public function delete($id)
    {
        $candidate = $this->findById($id);

        $this->candidateRepository->delete($candidate);
    }
}

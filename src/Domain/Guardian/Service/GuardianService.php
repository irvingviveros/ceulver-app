<?php
declare(strict_types=1);

namespace Domain\Guardian\Service;

use Domain\Guardian\Entity\GuardianEntity;
use Domain\Shared\Exception\ValueNotFoundException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Infrastructure\Guardian\Repository\EloquentGuardianRepository;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class GuardianService
{
    private EloquentGuardianRepository $guardianRepository;

    public function __construct(EloquentGuardianRepository $guardianRepository)
    {
        $this->guardianRepository = $guardianRepository;
    }

    public function getAll(): Collection|array
    {
        return $this->guardianRepository->all();
    }

    public function createGuardian(GuardianEntity $guardianEntity, $createdBy): int
    {
        $data = array(
            'name' => $guardianEntity->getName(),
            'last_name' => $guardianEntity->getLastName(),
            'phone' => $guardianEntity->getPhone(),
            'email' => $guardianEntity->getEmail(),
            'address' => $guardianEntity->getAddress(),
            'status' => $guardianEntity->getStatus(),
            'created_by' => $createdBy
        );

        if (!$this->guardianRepository->create($data)) {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    public function createGetId(GuardianEntity $guardianEntity, $createdBy): int
    {
        $data = array(
            'name' => $guardianEntity->getName(),
            'last_name' => $guardianEntity->getLastName(),
            'phone' => $guardianEntity->getPhone(),
            'email' => $guardianEntity->getEmail(),
            'address' => $guardianEntity->getAddress(),
            'status' => $guardianEntity->getStatus(),
            'created_at' => date_create(),
            'created_by' => $createdBy
        );

        return $this->guardianRepository->createGetId($data);
    }

    public function update($id, GuardianEntity $guardianEntity, $modifiedBy)
    {
        $guardian = $this->findById($id);

        //TODO: Busca en la bd si ya existe un registro igual

        $guardian->name = $guardianEntity->getName();
        $guardian->last_name = $guardianEntity->getLastName();
        $guardian->phone = $guardianEntity->getPhone();
        $guardian->email = $guardianEntity->getEmail();
        $guardian->address = $guardianEntity->getAddress();
        $guardian->status = $guardianEntity->getStatus();
        $guardian->modified_by = $modifiedBy;

        $this->guardianRepository->update($guardian);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id): mixed
    {
        // Get guardian data from the student
        try {
            return $this->guardianRepository->findById($id);
        } catch (ModelNotFoundException $exception) {
            //Send error message to Log
            Log::info($exception->getMessage());
            // Set guardian model to null
            return null;
        }
    }

    /**
     * @throws ValueNotFoundException
     */
    public function delete($id)
    {
        $guardian = $this->findById($id);

        $this->guardianRepository->delete($guardian);
    }

}

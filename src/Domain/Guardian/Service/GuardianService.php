<?php
declare(strict_types=1);

namespace Domain\Guardian\Service;

use Domain\Guardian\Entity\GuardianEntity;
use Domain\Shared\Exception\ValueNotFoundException;
use Illuminate\Database\Eloquent\Collection;
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
            'name'          => $guardianEntity->getName(),
            'last_name'     => $guardianEntity->getLastName(),
            'phone'         => $guardianEntity->getPhone(),
            'email'         => $guardianEntity->getEmail(),
            'address'       => $guardianEntity->getAddress(),
            'other_info'    => $guardianEntity->getOtherInfo(),
            'status'        => $guardianEntity->getStatus(),
            'created_by'    => $createdBy
        );

        if (!$this->guardianRepository->create($data))
        {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $guardian = $this->guardianRepository->findById($id);

        if ($guardian == null) {
            throw new ValueNotFoundException(
                "El padre o tutor no existe"
            );
        }

        return $guardian;
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
        $guardian->other_info = $guardianEntity->getOtherInfo();
        $guardian->status = $guardianEntity->getStatus();
        $guardian->modified_by = $modifiedBy;

        $this->guardianRepository->update($guardian);
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

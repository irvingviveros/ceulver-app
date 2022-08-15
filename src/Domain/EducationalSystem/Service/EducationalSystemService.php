<?php
declare(strict_types=1);

namespace Domain\EducationalSystem\Service;

use Domain\EducationalSystem\Entity\EducationalSystemEntity;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Shared\Repository\GlobalRepository;
use Infrastructure\EducationalSystem\Repository\EloquentEducationalSystemRepository;

class EducationalSystemService
{
    private EloquentEducationalSystemRepository $educationalSystemRepository;

    public function __construct(GlobalRepository $educationalSystemRepository)
    {
        $this->educationalSystemRepository = $this->educationalSystemRepository;
    }

    public function getAll()
    {
        return $this->educationalSystemRepository->all();
    }

    /**
     * @throws OperationNotPermittedCeulverException
     */
    public function create(EducationalSystemEntity $educationalSystem, int $createdBy, int $modifiedBy): int
    {
        if ($educationalSystem->getName() == '') {
            throw new OperationNotPermittedCeulverException(
                'El nombre se encuentra vacío'
            );
        }

        if ($this->educationalSystemRepository->checkIfNameExists($educationalSystem->getName())){
            throw new OperationNotPermittedCeulverException(
                "Ya se encuentra registrado"
            );
        }

        $data = array(
            'name' => $educationalSystem->getName()
        );

        $educationalSystem = $this->educationalSystemRepository->create($data);

        // If educational system exists, then return the ID
        if ($educationalSystem > 0) {
            return $educationalSystem;
        }

        // If the educational system doesn't exist, then return 0
        return 0;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById(int $id)
    {
        $educationalSystem = $this->educationalSystemRepository->findById($id);

        if ($educationalSystem == null) {
            throw new ValueNotFoundException(
                'El nivel educativo no existe'
            );
        }
        return $educationalSystem;
    }

    public function update(int $id, EducationalSystemEntity $educationalSystemEntity, int $modifiedBy)
    {
        $educationalSystem = $this->findById($id);

        $this->educationalSystemRepository->delete($educationalSystem);
    }
}

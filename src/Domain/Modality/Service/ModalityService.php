<?php
declare(strict_types=1);

namespace Domain\Modality\Service;

use Domain\Modality\Entity\ModalityEntity;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Shared\Repository\GlobalRepository;
use Infrastructure\Modality\Repository\EloquentModalityRepository;

class ModalityService
{
    private EloquentModalityRepository $modalityRepository;

    public function __construct(GlobalRepository $modalityRepository)
    {
        $this->modalityRepository = $modalityRepository;
    }

    public function getAll()
    {
        return $this->modalityRepository->all();
    }

    /**
     * @throws OperationNotPermittedCeulverException
     */
    public function create(ModalityEntity $modality, $createdBy, $modifiedBy): int
    {
        if($modality->getName() == '') {
            throw new OperationNotPermittedCeulverException(
                'El nombre se encuentra vacío'
            );
        }

        //Todo: hacer que también compare la escuela
        if($this->modalityRepository->checkIfNameExists($modality->getName())) {
            throw new OperationNotPermittedCeulverException(
                "Ya existe una modalidad igual"
            );
        }

        $data = array(
            'school_id'     => $modality->getSchoolId(),
            'name'          => $modality->getName(),
            'note'          => $modality->getNote(),
            'created_by'    => $createdBy,
            'modified_by'   => $modifiedBy
        );

        $modalityId = $this->modalityRepository->create($data);

        // If modality exists, then return the ID
        if ($modalityId > 0) {
            return $modalityId;
        }

        // If no modality exist, then return 0
        return 0;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $modality = $this->modalityRepository->findById($id);

        if ($modality == null) {
            throw new ValueNotFoundException(
                "La modalidad no existe"
            );
        }

        return $modality;
    }

    public function update($id, ModalityEntity $modalityEntity, $modifiedBy)
    {
        $modality = $this->findById($id);

        //TODO: Busca en la bd si ya existe un registro igual

        $modality->name = $modalityEntity->getName();
        $modality->note = $modalityEntity->getNote();
        $modality->modified_by = $modifiedBy;

        $this->modalityRepository->update($modality);
    }

    public function delete($id)
    {
        $modality = $this->findById($id);

        $this->modalityRepository->delete($modality);
    }
}
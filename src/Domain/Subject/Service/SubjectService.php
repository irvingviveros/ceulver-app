<?php
declare(strict_types=1);

namespace Domain\Subject\Service;

use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Shared\Repository\GlobalRepository;
use Domain\Subject\Entity\SubjectEntity;
use Infrastructure\Subject\Repository\EloquentSubjectRepository;

class SubjectService
{
    private EloquentSubjectRepository $subjectRepository;

    public function __construct(GlobalRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function getAll()
    {
        return $this->subjectRepository->all();
    }

    /**
     * @throws OperationNotPermittedCeulverException
     */
    public function create(
        SubjectEntity $subject,
        $createdBy,
        $modifiedBy
    ): int
    {
        if ($subject->getName() == '') {
            throw new OperationNotPermittedCeulverException(
                'El convenio se encuentra vacío'
            );
        }

        // Verify if the agreement exist
        if ($this->subjectRepository->checkIfNameExists($subject->getName())){
            throw new OperationNotPermittedCeulverException(
                "Ya existe un convenio con el mismo nombre"
            );
        }

        $data = array(
            'school_id'     => $subject->getSchoolId(),
            'name'          => $subject->getName(),
            'code'          => $subject->getCode(),
            'opening_date'  => $subject->getOpeningDate(),
            'description'   => $subject->getDescription(),
            'status'        => $subject->getStatus(),
            'created_by'    => $createdBy,
            'modified_by'   => $modifiedBy
        );

        $subjectId = $this->subjectRepository->create($data);

        // If subject exists, then return the ID
        if ($subjectId > 0) {
            return $subjectId;
        }

        // If no subject exist, then return 0
        return 0;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $subject = $this->subjectRepository->findById($id);

        if ($subject == null) {
            throw new ValueNotFoundException(
                "El convenio no existe"
            );
        }

        return $subject;
    }

    /**
     * @throws ValueNotFoundException
     * @throws OperationNotPermittedCeulverException
     */
    public function update(
        $id,
        SubjectEntity $subjectEntity,
        $modifiedBy
    )
    {
        $subject = $this->findById($id);

        if ($subject->name != $subjectEntity->getName()) {
            if ($this->subjectRepository->checkIfNameExists($subjectEntity->getName())) {
                throw new OperationNotPermittedCeulverException(
                    "Ya existe un convenio con el mismo nombre"
                );
            }
        }

        $subject->name = $subjectEntity->getName();
        $subject->code = $subjectEntity->getCode();
        $subject->opening_date = $subjectEntity->getOpeningDate();
        $subject->description = $subjectEntity->getDescription();
        $subject->status = $subjectEntity->getStatus();
        $subject->modified_by = $modifiedBy;

        $this->subjectRepository->update($subject);
    }

    /**
     * @throws ValueNotFoundException
     */
    public function delete($id)
    {
        $subject = $this->findById($id);

        $this->subjectRepository->delete($subject);
    }
}
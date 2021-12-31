<?php
declare(strict_types=1);

namespace Domain\Agreement\Service;

use Domain\Agreement\Entity\AgreementEntity;
use Domain\Shared\exception\CeulverOperationNotPermittedException;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Agreement\Repository\EloquentAgreementRepository;

class AgreementService
{
    /**
     * @var EloquentAgreementRepository
     */
    private EloquentAgreementRepository $agreementRepository;

    /**
     * @param EloquentAgreementRepository $agreementRepository
     */
    public function __construct(EloquentAgreementRepository $agreementRepository)
    {
        $this->agreementRepository = $agreementRepository;
    }

    /**
     * @return mixed
     */
    public function getAll() {
        return $this->agreementRepository->getAll();
    }

    /**
     * @param AgreementEntity $agreement
     * @param $createdBy
     * @param $modifiedBy
     * @return int
     * @throws CeulverOperationNotPermittedException
     * @throws ValueNotFoundException
     */
    public function create(
        AgreementEntity $agreement,
        $createdBy,
        $modifiedBy
    ): int
    {
        // Verify if the agreement input is not empty
        if ($agreement->getName() == '') {
            throw new CeulverOperationNotPermittedException(
                "El convenio se encuentra vacío"
            );
        }

        // Verify if the agreement exist
        if ($this->agreementRepository->checkIfNameExists($agreement->getName())){
            throw new ValueNotFoundException(
                "Ya existe un convenio con el mismo nombre"
            );
        }

        $data = array(
            'name'          => $agreement->getName(),
            'note'          => $agreement->getNote(),
            'status'        => $agreement->getStatus(),
            'created_by'    => $createdBy,
            'modified_by'   => $modifiedBy
        );

        $agreement_id = $this->agreementRepository->create($data);

        // If agreement exists, then return the ID
        if ($agreement_id > 0){
            return $agreement_id;
        }

        // If no agreement exist, then return 0
        return 0;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $agreement = $this->agreementRepository->findById($id);

        if ($agreement == null) {
            throw new ValueNotFoundException(
                "El convenio no existe"
            );
        }

        return $agreement;
    }

    /**
     * @param $data
     * @throws ValueNotFoundException
     * @throws OperationNotPermittedCeulverException
     */
    public function update(
        $id,
        AgreementEntity $agreementEntity,
        $modifiedBy
    )
    {
        $agreement = $this->findById($id);

        if ($agreement->name != $agreementEntity->getName()) {
            if ($this->agreementRepository->checkIfNameExists($agreementEntity->getName())) {
                throw new OperationNotPermittedCeulverException(
                    "Ya existe un convenio con el mismo nombre"
                );
            }
        }

        $agreement->name = $agreementEntity->getName();
        $agreement->note = $agreementEntity->getNote();
        $agreement->status = $agreementEntity->getStatus();
        $agreement->modified_by = $modifiedBy;

        $this->agreementRepository->update($agreement);
    }

    /**
     * @param $id
     * @throws ValueNotFoundException
     */
    public function delete($id)
    {
        $agreement = $this->findById($id);

        $this->agreementRepository->delete($agreement);
    }

    public function detach($id)
    {
        $agreement = $this->findById($id);

        $this->agreementRepository->detach($agreement);
    }

    /**
     * @param $relation
     * @return Builder[]|Collection
     */
    public function with($relation)
    {
        return $this->agreementRepository->with($relation);
    }

}
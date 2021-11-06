<?php
declare(strict_types=1);

namespace Domain\Agreement\Service;

use Domain\Agreement\Entity\AgreementEntity;
use Domain\Shared\exception\CeulverOperationNotPermittedException;
use Domain\Shared\Exception\ValueNotFoundException;
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
        if ($agreement->getAgreement() == '') {
            throw new CeulverOperationNotPermittedException(
                "El convenio se encuentra vacío"
            );
        }

        // Verify if the agreement exist
        if ($this->agreementRepository->checkIfNameExists($agreement->getAgreement())){
            throw new ValueNotFoundException(
                "Ya existe un convenio con el mismo nombre"
            );
        }

        $data = array(
            'agreement'=>$agreement->getAgreement(),
            'notes'=>$agreement->getNote(),
            'status'=>$agreement->getStatus(),
            'created_by'=>$createdBy,
            'modified_by'=>$modifiedBy
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
     */
    public function update($data)
    {
        $agreement = $this->findById($data['id']);

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

}
<?php
declare(strict_types=1);

namespace Domain\Agreement\Service;

use Domain\Agreement\Entity\AgreementEntity;
use Domain\Shared\exception\CeulverOperationNotPermittedException;
use Infrastructure\Agreement\Repository\EloquentAgreementRepository;

class AgreementService
{
    private EloquentAgreementRepository $agreementRepository;

    public function __construct(EloquentAgreementRepository $agreementRepository)
    {
        $this->agreementRepository = $agreementRepository;
    }

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

}
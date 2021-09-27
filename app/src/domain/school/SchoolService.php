<?php
declare(strict_types = 1);

namespace App\src\domain\school;

use App\src\domain\shared\exception\CeulverOperationNotPermittedException;

class SchoolService {
    private $schoolRepository;

    /**
     * @param SchoolRepository $schoolRepository
     */
    public function __construct(SchoolRepository $schoolRepository) {
        $this->schoolRepository = $schoolRepository;
    }

    /**
     * @throws CeulverOperationNotPermittedException
     */
    public function create(
        ?string $schoolName
        , ?string $schoolAddress
        , ?string $schoolEmail
        , ?string $schoolAdmission
        , $createdBy
        , $modifiedBy
    ) {
        // TODO seria bueno mapear a objeto cada uno de los atributos

        if ($schoolName == ''
            && $schoolAddress == ''
            && $schoolEmail == ''
            && $schoolAdmission == ''
        ) {
            throw new CeulverOperationNotPermittedException(
                "Todos los campos se encuentran vacios"
            );
        }

        $data = array(
            'school_name'=>$schoolName,
            "address"=>$schoolAddress,
            "email"=>$schoolEmail,
            "enable_online_admission"=>$schoolAdmission,
            "created_by"=>$createdBy,
            "modified_by"=>$modifiedBy
        );

        $schoolId = $this->schoolRepository->create($data);

        if ($schoolId == 0) {
            # 400
            throw new CeulverOperationNotPermittedException(
                "La institución ya se encontraba registrada"
            );
        }

        return $schoolId;
    }
}

// 200 - OK, 1, "peticion correcta"
// 400 - "Todos los campos se encuentran vacios", "La escuela ya se encuentra registrada"
// 500 - "Error interno del servidor"
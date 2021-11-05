<?php
declare(strict_types = 1);

namespace Domain\Career\Service;

use Domain\Career\Entity\CareerEntity;
use Domain\Career\Repository\CareerRepository;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;

class CareerService {

    private CareerRepository $careerRepository;

    /**
     * @param CareerRepository $careerRepository
     */
    public function __construct(CareerRepository $careerRepository){
        $this->careerRepository = $careerRepository;
    }

    /**
     * @param CareerEntity $career
     * @param $createdBy
     * @param $modifiedBy
     * @return int
     * @throws OperationNotPermittedCeulverException
     * @throws ValueNotFoundException
     */
    public function create(
        CareerEntity $career,
        $createdBy,
        $modifiedBy
    ) {
        if ($career->getCareerName() == ''
            && $career->getEnrollment() == ''
            && $career->getOpeningDate() == ''
        ) {
            throw new OperationNotPermittedCeulverException(
                "Todos los campos se encuentran vacíos"
            );
        }

        if ($this->careerRepository->checkIfNameExists($career->getCareerName())) {
            throw new ValueNotFoundException(
                "Ya existe una carrera con el mismo nombre"
            );
        }

        $data = array(

            'name'         => $career->getCareerName(),
            "enrollment"   => $career->getEnrollment(),
            "opening_date" => $career->getOpeningDate(),
            "created_by"   => $createdBy,
            "modified_by"  => $modifiedBy
        );

        $id = $this->careerRepository->create($data);

        // Si existe una carrera en la BD, entonces retorna el ID
        if ($id) {
            return $id;
        }

        // De lo contrario, retorna 0
        return 0;
    }

    /**
     * @param $id
     * @return mixed
     * @throws ValueNotFoundException
     */
    public function findById($id) {
        $career = $this->careerRepository->findById($id);

        if ($career == null) {
            throw new ValueNotFoundException(
                "La carrera no existe"
            );
        }

        return $career;
    }

    /**
     * @param $data
     * @throws ValueNotFoundException
     */
    public function update($data) {
        $career = $this->findById($data['id']);

        $this->careerRepository->update($career);
    }

    /**
     * @param $id
     * @throws ValueNotFoundException
     */
    public function delete($id) {
        $career = $this->findById($id);

        $this->careerRepository->delete($career);
    }
}
<?php
declare(strict_types = 1);

namespace Domain\Career\Service;

use Domain\Career\Entity\CareerEntity;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Career\Repository\EloquentCareerRepository;

class CareerService {

    private EloquentCareerRepository $careerRepository;

    /**
     * @param EloquentCareerRepository $careerRepository
     */
    public function __construct(EloquentCareerRepository $careerRepository){
        $this->careerRepository = $careerRepository;
    }

    /**
     * @param CareerEntity $career
     * @param $createdBy
     * @param $modifiedBy
     * @return int
     * @throws OperationNotPermittedCeulverException
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
            throw new OperationNotPermittedCeulverException(
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


    public function getAll(): Collection|array
    {
        return $this->careerRepository->all();
    }

    /**
     * @param $id
     * @return mixed
     * @throws OperationNotPermittedCeulverException
     */
    public function findById($id) {
        $career = $this->careerRepository->findById($id);

        if ($career == null) {
            throw new OperationNotPermittedCeulverException(
                "La carrera no existe"
            );
        }

        return $career;
    }

    /**
     * @param $id
     * @param CareerEntity $careerEntity
     * @param $modifiedBy
     * @throws OperationNotPermittedCeulverException
     */
    public function update(
          $id
        , CareerEntity $careerEntity
        , $modifiedBy
    ) {
        $career = $this->findById($id);

        if ($career->name != $careerEntity->getCareerName()) {
            if ($this->careerRepository->checkIfNameExists($careerEntity->getCareerName())) {
                throw new OperationNotPermittedCeulverException(
                    "Ya existe una carrera con el mismo nombre"
                );
            }
        }

        $career->name = $careerEntity->getCareerName();
        $career->enrollment = $careerEntity->getEnrollment();
        $career->opening_date = $careerEntity->getOpeningDate();
        $career->modified_by = $modifiedBy;

        $this->careerRepository->update($career);
    }

    /**
     * @param $id
     * @throws OperationNotPermittedCeulverException
     */
    public function delete($id) {
        $career = $this->findById($id);

        $this->careerRepository->delete($career);
    }

    public function orderBy($name, $direction = 'asc'): \Illuminate\Support\Collection
    {
        return $this->careerRepository->orderBy($name, $direction);
    }
}

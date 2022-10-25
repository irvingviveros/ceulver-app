<?php
declare(strict_types=1);

namespace Domain\School\Service;

use Domain\School\Entity\SchoolEntity;
use Domain\Shared\Exception\CeulverOperationNotPermittedException;
use Domain\Shared\Exception\ValueNotFoundException;
use Illuminate\Support\Collection;
use Infrastructure\School\Repository\EloquentSchoolRepository;

class SchoolService
{
    private EloquentSchoolRepository $schoolRepository;

    /**
     * @param EloquentSchoolRepository $schoolRepository
     */
    public function __construct(EloquentSchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    /**
     * @throws CeulverOperationNotPermittedException|ValueNotFoundException
     */
    public function create(SchoolEntity $school, $createdBy, $modifiedBy): int
    {
        if ($school->getSchoolName() == ''
            && $school->getSchoolAddress() == ''
            && $school->getSchoolEmail() == ''
            && $school->getSchoolAdmission() == ''
        ) {
            throw new CeulverOperationNotPermittedException("Todos los campos se encuentran vacíos");
        }

        if ($this->schoolRepository->checkIfNameExists($school->getSchoolName())) {
            throw new ValueNotFoundException(
                "Ya existe una escuela con el mismo nombre"
            );
        }

        $data = array(
            'school_name' => $school->getSchoolName(),
            "address" => $school->getSchoolAddress(),
            "email" => $school->getSchoolEmail(),
            "enable_online_admission" => $school->getSchoolAdmission(),
            "created_by" => $createdBy,
            "modified_by" => $modifiedBy
        );

        $school_id = $this->schoolRepository->create($data);

        // Si existe una escuela, entonces retorna el ID
        if ($school_id > 0) {
            return $school_id;
        }

        // Si no existe una escuela, entonces retorna 0
        return 0;
    }

    public function getAll($columns = ['*'])
    {
        return $this->schoolRepository->all($columns);
    }

    public function where($column, $operator = null, $value = null, string $boolean = 'and')
    {
        return $this->schoolRepository->where($column, $operator, $value, $boolean);
    }

    /**
     * @throws ValueNotFoundException
     */
    public function update($data)
    {
        $school = $this->findById($data['id']);

        $this->schoolRepository->update($school);
    }

    /**
     * @param $id
     * @return mixed
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $school = $this->schoolRepository->findById($id);

        if ($school == null) {
            throw new ValueNotFoundException(
                "La escuela no existe"
            );
        }

        return $school;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function delete($id)
    {
        $school = $this->findById($id);

        $this->schoolRepository->delete($school);
    }

    public function saveLogo($request)
    {
        if ($request->hasFile('school-logo')) {
            $file = $request->file('school-logo');
            $extension = $file->getClientOriginalExtension(); //get original file extension
            $name = uniqid() . '.' . $extension; //assign new file name
            $file->move(public_path() . '/images/uploads/schools/logo', $name);
        }
    }

    public function orderBy($name, $direction = 'asc'): Collection
    {
        return $this->schoolRepository->orderBy($name, $direction);
    }
}

// 200 - OK, 1, "peticion correcta"
// 400 - "Todos los campos se encuentran vacios", "La escuela ya se encuentra registrada"
// 500 - "Error interno del servidor"

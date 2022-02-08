<?php
declare(strict_types=1);

namespace Domain\Teacher\Service;

use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Shared\Repository\GlobalRepository;
use Domain\Teacher\Entity\TeacherEntity;
use Infrastructure\Teacher\Repository\EloquentTeacherRepository;

class TeacherService
{
    private EloquentTeacherRepository $teacherRepository;

    public function __construct(GlobalRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    public function getAll()
    {
        return $this->teacherRepository->all();
    }

    /**
     * @throws OperationNotPermittedCeulverException
     */
    public function create(TeacherEntity $teacher, $createdBy, $modifiedBy)
    {
        if ($teacher->getResponsibility() == '' || $teacher->getResponsibility() == null) {
            throw new OperationNotPermittedCeulverException(
                'Debe relacionar al maestro con alguna materia'
            );
        }

        if ($teacher->getFirstName() && $teacher->getPaternalSurname() == '') {
            throw new OperationNotPermittedCeulverException(
              'El nombre y/o apellido se encuentra vacío'
            );
        }

        // Verify if the teacher exist
        if ($this->teacherRepository->checkIfNameExists($teacher->getNationalId())){
            throw new OperationNotPermittedCeulverException(
                "El maestro ya se encuentra registrado"
            );
        }

        $data = array(
            'school_id'      => $teacher->getSchoolId(),
            'rfc'            => $teacher->getRfc(),
            'enrollment'     => $teacher->getEnrollment(), //Matrícula
            'responsibility' => $teacher->getResponsibility(),
            'national_id'    => $teacher->getNationalId(),
            'first_name'     => $teacher->getFirstName(),
            'middle_name'    => $teacher->getMiddleName(),
            'paternal_surname' => $teacher->getPaternalSurname(),
            'maternal_surname' => $teacher->getMaternalSurname(),
            'email'          => $teacher->getEmail(),
            'phone'          => $teacher->getPhone(),
            'address'        => $teacher->getAddress(),
            'blood_group'    => $teacher->getBloodGroup(),
            'birth_date'     => $teacher->getBirthDate(),
            'joining_date'   => $teacher->getJoiningDate(),
            'resign_date'    => $teacher->getResignDate(),
            'photo'          => $teacher->getPhoto(),
            'resume'         => $teacher->getResume(),
            'linkedin_url'   => $teacher->getLinkedinUrl(),
            'other_info'     => $teacher->getOtherInfo(),
            'status'         => $teacher->getStatus(),
            'created_by'     => $createdBy,
            'modified_by'    => $modifiedBy
        );

        $teacherId = $this->teacherRepository->create($data);

        // If exists, then return the ID
        if ($teacherId > 0) {
            return $teacherId;
        }

        // If no exist, then return 0
        return 0;
    }

    public function findById($id)
    {
        $teacher = $this->teacherRepository->findById($id);

        if ($teacher == null) {
            throw new ValueNotFoundException(
                "El maestro no existe"
            );
        }

        return $teacher;
    }

    public function update($id, TeacherEntity $teacherEntity, $modifiedBy)
    {
        $teacher = $this->findById($id);

        //TODO: Busca en la bd si ya existe un registro igual
        //TODO: Get school id? por si se modifica también la escuela
        $teacher->rfc = $teacherEntity->getRfc();
        $teacher->enrollment = $teacherEntity->getEnrollment();
        $teacher->responsibility = $teacherEntity->getResponsibility();
        $teacher->national_id = $teacherEntity->getNationalId();
        $teacher->first_name = $teacherEntity->getFirstName();
        $teacher->middle_name = $teacherEntity->getMiddleName();
        $teacher->paternal_surname = $teacherEntity->getPaternalSurname();
        $teacher->maternal_surname = $teacherEntity->getMaternalSurname();
        $teacher->email = $teacherEntity->getEmail();
        $teacher->phone = $teacherEntity->getPhone();
        $teacher->address = $teacherEntity->getAddress();
        $teacher->blood_group = $teacherEntity->getBloodGroup();
        $teacher->birth_date = $teacherEntity->getBirthDate();
        $teacher->joining_date = $teacherEntity->getJoiningDate();
        $teacher->resign_date = $teacherEntity->getResignDate();
        $teacher->photo = $teacherEntity->getPhoto();
        $teacher->resume = $teacherEntity->getResume();
        $teacher->linkedin_url = $teacherEntity->getLinkedinUrl();
        $teacher->other_info = $teacherEntity->getOtherInfo();
        $teacher->status = $teacherEntity->getStatus();
        $teacher->modified_by = $modifiedBy;

        $this->teacherRepository->update($teacher);
    }

    /**
     * @throws ValueNotFoundException
     */
    public function delete($id)
    {
        $teacher = $this->findById($id);

        $this->teacherRepository->delete($teacher);
    }
}
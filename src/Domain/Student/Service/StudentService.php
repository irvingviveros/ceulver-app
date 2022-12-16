<?php
declare(strict_types=1);

namespace Domain\Student\Service;

use Carbon\Carbon;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Student\Actions\CalculateAge;
use Domain\Student\Entity\StudentEntity;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Student\Repository\EloquentStudentRepository;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class StudentService
{
    private EloquentStudentRepository $studentRepository;

    public function __construct(EloquentStudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAll(): Collection|array
    {
        return $this->studentRepository->all();
    }

    public function createStudent(StudentEntity $student, $createdBy): int
    {

        $data = array(
            'school_id'             => $student->getSchoolId(),
            'career_id'             => $student->getCareerId(),
            'user_id'               => $student->getUserId(),
//            'agreement_id' => $student->getAgreementId(),
            'guardian_id'           => $student->getGuardianId(),
            'national_id'           => $student->getNationalId(),
            'nationality'           => $student->getNationality(),
            'enrollment'            => $student->getEnrollment(),
            'payment_reference'     => $student->getPaymentReference(),
//            'admission_no' => $student->getAdmissionNo(),
//            'admission_date' => $student->getAdmissionDate(),
            'first_name'            => $student->getFirstName(),
            'paternal_surname'      => $student->getPaternalSurname(),
            'maternal_surname'      => $student->getMaternalSurname(),
            'address'               => $student->getAddress(),
            'birth_date'            => $student->getBirthDate(),
            'age'                   => $student->getAge(),
            'occupation'            => $student->getOccupation(),
            'personal_email'        => $student->getPersonalEmail(),
            'personal_phone'        => $student->getPersonalPhone(),
            'marital_status'        => $student->getMaritalStatus(),
            'sex'                   => $student->getSex(),
            'blood_group'           => $student->getBloodGroup(),
            'allergies'             => $student->getAllergies(),
            'ailments'              => $student->getAilments(),
            'guardian_relationship' => $student->getGuardianRelationship(),
            'status'                => $student->getStatus(),
            'created_by'            => $createdBy,
            'created_at'            => date_create(),
        );

        if (!$this->studentRepository->create($data))
        {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $student = $this->studentRepository->findById($id);

        if ($student == null) {
            throw new ValueNotFoundException(
                "El alumno no existe"
            );
        }

        return $student;
    }

    public function update($studentId, StudentEntity $studentEntity, $modifiedBy)
    {
        $student = $this->findById($studentId);

        //TODO: Busca en la bd si ya existe un registro igual

        $student->school_id = $studentEntity->getSchoolId();
        $student->career_id = $studentEntity->getCareerId();
//        $student->agreement_id = $studentEntity->getAgreementId();
//        $student->guardian_id = $studentEntity->getGuardianId();
        $student->national_id = $studentEntity->getNationalId();
        $student->enrollment = $studentEntity->getEnrollment();
        $student->payment_reference = $studentEntity->getPaymentReference();
//        $student->admission_no = $studentEntity->getAdmissionNo();
//        $student->admission_date = $studentEntity->getAdmissionDate();
        $student->first_name = $studentEntity->getFirstName();
        $student->paternal_surname = $studentEntity->getPaternalSurname();
        $student->maternal_surname = $studentEntity->getMaternalSurname();
        $student->address = $studentEntity->getAddress();
        $student->birth_date = $studentEntity->getBirthDate();
        $student->age = $studentEntity->getAge();
        $student->occupation = $studentEntity->getOccupation();
        $student->personal_email = $studentEntity->getPersonalEmail();
        $student->personal_phone = $studentEntity->getPersonalPhone();
        $student->nationality = $studentEntity->getNationality();
        $student->marital_status = $studentEntity->getMaritalStatus();
        $student->sex = $studentEntity->getSex();
        $student->blood_group = $studentEntity->getBloodGroup();
        $student->allergies = $studentEntity->getAllergies();
        $student->ailments = $studentEntity->getAilments();
        $student->status = $studentEntity->getStatus();
        $student->guardian_relationship = $studentEntity->getGuardianRelationship();
        $student->modified_by = $modifiedBy;
        $student->updated_at = date_create();

        if (!$this->studentRepository->update($student))
        {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function delete($id)
    {
        $student = $this->findById($id);

        $this->studentRepository->delete($student);
    }

    public function where($column, $operator, $value): \Illuminate\Support\Collection
    {
        return $this->studentRepository->where($column, $operator, $value);
    }

    public function getAllByEducationalSystem(string $educationalSystem)
    {
        return $this->studentRepository->allByEducationalSystem($educationalSystem);
    }

    public function calculateAge(Carbon $birth_date): int
    {
        return CalculateAge::execute($birth_date);
    }
}

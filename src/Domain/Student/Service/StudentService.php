<?php
declare(strict_types=1);

namespace Domain\Student\Service;

use Carbon\Carbon;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Shared\Repository\GlobalRepository;
use Domain\Student\Entity\StudentEntity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Date;
use Infrastructure\Student\Repository\EloquentStudentRepository;

class StudentService
{
    private EloquentStudentRepository $studentRepository;

    public function __construct(GlobalRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAll(): Collection|array
    {
        return $this->studentRepository->all();
    }

    public function create(StudentEntity $student, $createdBy, $modifiedBy): int
    {
        // TODO: Validaciones?

        $data = array(
            'school_id' => $student->getSchoolId(),
            'career_id' => $student->getCareerId(),
            'user_id' => $student->getUserId(),
//            'agreement_id' => $student->getAgreementId(),
//            'guardian_id' => $student->getGuardianId(),
            'national_id' => $student->getNationalId(),
//            'enrollment' => $student->getEnrollment(),
//            'admission_no' => $student->getAdmissionNo(),
//            'admission_date' => $student->getAdmissionDate(),
            'first_name' => $student->getFirstName(),
            'paternal_surname' => $student->getPaternalSurname(),
            'maternal_surname' => $student->getMaternalSurname(),
            'address' => $student->getAddress(),
            'birth_date' => $student->getBirthDate(),
//            'age' => $student->getAge(),
            'occupation' => $student->getOccupation(),
            'personal_email' => $student->getPersonalEmail(),
//            'home_phone' => $student->getHomePhone(),
            'personal_phone' => $student->getPersonalPhone(),
//            'nationality' => $student->getNationality(),
//            'marital_status' => $student->getMaritalStatus(),
            'sex' => $student->getSex(),
//            'gender' => $student->getGender(),
//            'religion' => $student->getReligion(),
//            'father_name' => $student->getFatherName(),
//            'father_phone' => $student->getFatherPhone(),
//            'father_profession' => $student->getFatherProfession(),
//            'mother_name' => $student->getMotherName(),
//            'mother_phone' => $student->getMotherPhone(),
//            'mother_profession' => $student->getMotherProfession(),
            'blood_group' => $student->getBloodGroup(),
            'allergies' => $student->getAllergies(),
            'ailments' => $student->getAilments(),
//            'other_info' => $student->getOtherInfo(),
//            'health_condition' => $student->getHealthCondition(),
            'status' => $student->getStatus(),
            'created_by' => $createdBy,
            'modified_by' => $modifiedBy
        );

        $studentId = $this->studentRepository->create($data);

        // If the student exists, then return the ID
        if ($studentId > 0) {
            return $studentId;
        }

        // If the student doesn't exist, then return 0
        return 0;
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

    public function update($id, StudentEntity $studentEntity, $modifiedBy)
    {
        $student = $this->findById($id);

        //TODO: Busca en la bd si ya existe un registro igual

        $student->school_id = $studentEntity->getSchoolId();
        $student->career_id = $studentEntity->getCareerId();
        $student->agreement_id = $studentEntity->getAgreementId();
        $student->guardian_id = $studentEntity->getGuardianId();
        $student->national_id = $studentEntity->getNationalId();
        $student->enrollment = $studentEntity->getEnrollment();
        $student->admission_no = $studentEntity->getAdmissionNo();
        $student->admission_date = $studentEntity->getAdmissionDate();
        $student->first_name = $studentEntity->getFirstName();
        $student->paternal_surname = $studentEntity->getPaternalSurname();
        $student->maternal_surname = $studentEntity->getMaternalSurname();
        $student->address = $studentEntity->getAddress();
        $student->birth_date = $studentEntity->getBirthDate();
        $student->age = $studentEntity->getAge();
        $student->occupation = $studentEntity->getOccupation();
        $student->personal_email = $studentEntity->getPersonalEmail();
        $student->home_phone = $studentEntity->getHomePhone();
        $student->personal_phone = $studentEntity->getPersonalPhone();
        $student->nationality = $studentEntity->getNationality();
        $student->marial_status = $studentEntity->getMaritalStatus();
        $student->sex = $studentEntity->getSex();
        $student->gender = $studentEntity->getGender();
        $student->religion = $studentEntity->getReligion();
        $student->father_name = $studentEntity->getFatherName();
        $student->father_phone = $studentEntity->getFatherPhone();
        $student->father_profession = $studentEntity->getFatherProfession();
        $student->mother_name = $studentEntity->getMotherName();
        $student->mother_phone = $studentEntity->getMotherPhone();
        $student->mother_profession = $studentEntity->getMotherProfession();
        $student->blood_group = $studentEntity->getBloodGroup();
        $student->allergies = $studentEntity->getAllergies();
        $student->ailments = $studentEntity->getAilments();
        $student->other_info = $studentEntity->getOtherInfo();
        $student->health_condition = $studentEntity->getHealthCondition();
        $student->status = $studentEntity->getStatus();
        $student->modified_by = $modifiedBy;

        $this->studentRepository->update($student);
    }

    /**
     * @throws ValueNotFoundException
     */
    public function delete($id)
    {
        $student = $this->findById($id);

        $this->studentRepository->delete($student);
    }

    public function getFullName(
        string $first_name,
        string $paternal_surname,
        ?string $maternal_surname): string
    {
        return "{$first_name} {$paternal_surname} {$maternal_surname}";
    }

    public function calculateAge(
        Date $birth_date
    ): int
    {
        $date = $birth_date;
        $dateFormat = Carbon::createFromDate($date);
        $now = Carbon::now();
        return $dateFormat->diffInYears($now);
    }
}

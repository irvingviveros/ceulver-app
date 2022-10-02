<?php
declare(strict_types=1);

namespace Domain\Student\Entity;

use Carbon\Carbon;

class StudentEntity
{
    private string $national_id;
    private string $enrollment;
    private ?string $admission_no;
    private ?Carbon $admission_date;
    private string $first_name;
    private ?string $paternal_surname;
    private ?string $maternal_surname;
    private Carbon $birth_date;
    private ?string $address;
    private ?int $age;
    private ?string $occupation;
    private ?string $personal_email;
    private ?string $home_phone;
    private ?string $personal_phone;
    private ?string $nationality;
    private ?string $marital_status;
    private ?string $sex;
    private ?string $gender;
    private ?string $religion;
    // Parents info
    private ?string $father_name;
    private ?string $father_phone;
    private ?string $father_profession;
    private ?string $mother_name;
    private ?string $mother_phone;
    private ?string $mother_profession;
    // Health and other info
    private ?string $blood_group;
    private ?string $allergies;
    private ?string $ailments;
    private ?string $other_info;
    private ?string $health_condition;
    private ?int $status;
    // Foreign info
    private int $school_id;
    private int $user_id;
    private ?int $agreement_id;
    private ?int $guardian_id;
    private ?int $career_id;

    /**
     * @return string
     */
    public function getNationalId(): string
    {
        return $this->national_id;
    }

    /**
     * @param string $national_id
     */
    public function setNationalId(string $national_id): void
    {
        $this->national_id = $national_id;
    }

    /**
     * @return string|null
     */
    public function getEnrollment(): ?string
    {
        return $this->enrollment;
    }

    /**
     * @param string|null $enrollment
     */
    public function setEnrollment(?string $enrollment): void
    {
        $this->enrollment = $enrollment;
    }

    /**
     * @return string|null
     */
    public function getAdmissionNo(): ?string
    {
        return $this->admission_no;
    }

    /**
     * @param string|null $admission_no
     */
    public function setAdmissionNo(?string $admission_no = null): void
    {
        $this->admission_no = $admission_no;
    }

    /**
     * @return Carbon|null
     */
    public function getAdmissionDate(): ?Carbon
    {
        return $this->admission_date;
    }

    /**
     * @param Carbon|null $admission_date
     */
    public function setAdmissionDate(?Carbon $admission_date = null): void
    {
        $this->admission_date = $admission_date;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string|null
     */
    public function getPaternalSurname(): ?string
    {
        return $this->paternal_surname;
    }

    /**
     * @param string|null $paternal_surname
     */
    public function setPaternalSurname(?string $paternal_surname = null): void
    {
        $this->paternal_surname = $paternal_surname;
    }

    /**
     * @return string|null
     */
    public function getMaternalSurname(): ?string
    {
        return $this->maternal_surname;
    }

    /**
     * @param string|null $maternal_surname
     */
    public function setMaternalSurname(?string $maternal_surname = null): void
    {
        $this->maternal_surname = $maternal_surname;
    }

    /**
     * @return Carbon
     */
    public function getBirthDate(): Carbon
    {
        return $this->birth_date;
    }

    /**
     * @param Carbon $birth_date
     */
    public function setBirthDate(Carbon $birth_date): void
    {
        $this->birth_date = $birth_date;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address = null): void
    {
        $this->address = $address;
    }

    /**
     * @return int|null
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @param int|null $age
     */
    public function setAge(?int $age = null): void
    {
        $this->age = $age;
    }

    /**
     * @return string|null
     */
    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    /**
     * @param string|null $occupation
     */
    public function setOccupation(?string $occupation = null): void
    {
        $this->occupation = $occupation;
    }

    /**
     * @return string|null
     */
    public function getPersonalEmail(): ?string
    {
        return $this->personal_email;
    }

    /**
     * @param string|null $personal_email
     */
    public function setPersonalEmail(?string $personal_email = null): void
    {
        $this->personal_email = $personal_email;
    }

    /**
     * @return string|null
     */
    public function getHomePhone(): ?string
    {
        return $this->home_phone;
    }

    /**
     * @param string|null $home_phone
     */
    public function setHomePhone(?string $home_phone = null): void
    {
        $this->home_phone = $home_phone;
    }

    /**
     * @return string|null
     */
    public function getPersonalPhone(): ?string
    {
        return $this->personal_phone;
    }

    /**
     * @param string|null $personal_phone
     */
    public function setPersonalPhone(?string $personal_phone = null): void
    {
        $this->personal_phone = $personal_phone;
    }

    /**
     * @return string|null
     */
    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    /**
     * @param string|null $nationality
     */
    public function setNationality(?string $nationality = null): void
    {
        $this->nationality = $nationality;
    }

    /**
     * @return string|null
     */
    public function getMaritalStatus(): ?string
    {
        return $this->marital_status;
    }

    /**
     * @param string|null $marital_status
     */
    public function setMaritalStatus(?string $marital_status = null): void
    {
        $this->marital_status = $marital_status;
    }

    /**
     * @return string|null
     */
    public function getSex(): ?string
    {
        return $this->sex;
    }

    /**
     * @param string|null $sex
     */
    public function setSex(?string $sex = null): void
    {
        $this->sex = $sex;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     */
    public function setGender(?string $gender = null): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string|null
     */
    public function getReligion(): ?string
    {
        return $this->religion;
    }

    /**
     * @param string|null $religion
     */
    public function setReligion(?string $religion = null): void
    {
        $this->religion = $religion;
    }

    /**
     * @return string|null
     */
    public function getFatherName(): ?string
    {
        return $this->father_name;
    }

    /**
     * @param string|null $father_name
     */
    public function setFatherName(?string $father_name = null): void
    {
        $this->father_name = $father_name;
    }

    /**
     * @return string|null
     */
    public function getFatherPhone(): ?string
    {
        return $this->father_phone;
    }

    /**
     * @param string|null $father_phone
     */
    public function setFatherPhone(?string $father_phone = null): void
    {
        $this->father_phone = $father_phone;
    }

    /**
     * @return string|null
     */
    public function getFatherProfession(): ?string
    {
        return $this->father_profession;
    }

    /**
     * @param string|null $father_profession
     */
    public function setFatherProfession(?string $father_profession = null): void
    {
        $this->father_profession = $father_profession;
    }

    /**
     * @return string|null
     */
    public function getMotherName(): ?string
    {
        return $this->mother_name;
    }

    /**
     * @param string|null $mother_name
     */
    public function setMotherName(?string $mother_name = null): void
    {
        $this->mother_name = $mother_name;
    }

    /**
     * @return string|null
     */
    public function getMotherPhone(): ?string
    {
        return $this->mother_phone;
    }

    /**
     * @param string|null $mother_phone
     */
    public function setMotherPhone(?string $mother_phone = null): void
    {
        $this->mother_phone = $mother_phone;
    }

    /**
     * @return string|null
     */
    public function getMotherProfession(): ?string
    {
        return $this->mother_profession;
    }

    /**
     * @param string|null $mother_profession
     */
    public function setMotherProfession(?string $mother_profession = null): void
    {
        $this->mother_profession = $mother_profession;
    }

    /**
     * @return string|null
     */
    public function getBloodGroup(): ?string
    {
        return $this->blood_group;
    }

    /**
     * @param string|null $blood_group
     */
    public function setBloodGroup(?string $blood_group = null): void
    {
        $this->blood_group = $blood_group;
    }

    /**
     * @return string|null
     */
    public function getAllergies(): ?string
    {
        return $this->allergies;
    }

    /**
     * @param string|null $allergies
     */
    public function setAllergies(?string $allergies = null): void
    {
        $this->allergies = $allergies;
    }

    /**
     * @return string|null
     */
    public function getAilments(): ?string
    {
        return $this->ailments;
    }

    /**
     * @param string|null $ailments
     */
    public function setAilments(?string $ailments = null): void
    {
        $this->ailments = $ailments;
    }

    /**
     * @return string|null
     */
    public function getOtherInfo(): ?string
    {
        return $this->other_info;
    }

    /**
     * @param string|null $other_info
     */
    public function setOtherInfo(?string $other_info = null): void
    {
        $this->other_info = $other_info;
    }

    /**
     * @return string|null
     */
    public function getHealthCondition(): ?string
    {
        return $this->health_condition;
    }

    /**
     * @param string|null $health_condition
     */
    public function setHealthCondition(?string $health_condition = null): void
    {
        $this->health_condition = $health_condition;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     */
    public function setStatus(?int $status = 1): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getSchoolId(): int
    {
        return $this->school_id;
    }

    /**
     * @param int $school_id
     */
    public function setSchoolId(int $school_id): void
    {
        $this->school_id = $school_id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int|null
     */
    public function getAgreementId(): ?int
    {
        return $this->agreement_id;
    }

    /**
     * @param int|null $agreement_id
     */
    public function setAgreementId(?int $agreement_id = null): void
    {
        $this->agreement_id = $agreement_id;
    }

    /**
     * @return int|null
     */
    public function getGuardianId(): ?int
    {
        return $this->guardian_id;
    }

    /**
     * @param int|null $guardian_id
     */
    public function setGuardianId(?int $guardian_id = null): void
    {
        $this->guardian_id = $guardian_id;
    }

    /**
     * @return int|null
     */
    public function getCareerId(): ?int
    {
        return $this->career_id;
    }

    /**
     * @param int|null $career_id
     */
    public function setCareerId(?int $career_id = null): void
    {
        $this->career_id = $career_id;
    }
}

<?php
declare(strict_types=1);

namespace Domain\Student\Entity;

use Carbon\Carbon;

class StudentEntity
{
    private string $national_id;
    private ?string $enrollment;
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
    private ?string $personal_phone;
    private ?string $nationality;
    private ?string $marital_status;
    private ?string $sex;
    private ?string $payment_reference;
    // Health and other info
    private ?string $blood_group;
    private ?string $allergies;
    private ?string $ailments;
    private ?int $status;
    private ?string $guardian_relationship;
    // Foreign info
    private int $school_id;
    private int $user_id;
    private ?int $agreement_id;
    private ?int $guardian_id = null;
    private ?int $career_id;
    private ?string $street_number;
    private ?string $neighborhood;
    private ?string $between_streets;
    private ?string $zip;
    private ?string $city;
    private ?string $state;
    private ?Carbon $inscription_date;

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
    public function setEnrollment(?string $enrollment = null): void
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
     * @param string|null $admission_date
     */
    public function setAdmissionDate(?string $admission_date = null): void
    {
        $this->admission_date = Carbon::parse($admission_date);
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
     * @param string $birth_date
     */
    public function setBirthDate(string $birth_date): void
    {
        $this->birth_date = Carbon::parse($birth_date);
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
    public function setNationality(?string $nationality = 'Mexicana'): void
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
     * @return string|null
     */
    public function getPaymentReference(): ?string
    {
        return $this->payment_reference;
    }

    /**
     * @param string|null $payment_reference
     */
    public function setPaymentReference(?string $payment_reference = null): void
    {
        $this->payment_reference = $payment_reference;
    }

    /**
     * @return string|null
     */
    public function getGuardianRelationship(): ?string
    {
        return $this->guardian_relationship;
    }

    /**
     * @param string|null $guardian_relationship
     */
    public function setGuardianRelationship(?string $guardian_relationship = null): void
    {
        $this->guardian_relationship = $guardian_relationship;
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

    /**
     * @return string|null
     */
    public function getStreetNumber(): ?string
    {
        return $this->street_number;
    }

    /**
     * @param string|null $street_number
     */
    public function setStreetNumber(?string $street_number): void
    {
        $this->street_number = $street_number;
    }

    /**
     * @return string|null
     */
    public function getNeighborhood(): ?string
    {
        return $this->neighborhood;
    }

    /**
     * @param string|null $neighborhood
     */
    public function setNeighborhood(?string $neighborhood): void
    {
        $this->neighborhood = $neighborhood;
    }

    /**
     * @return string|null
     */
    public function getBetweenStreets(): ?string
    {
        return $this->between_streets;
    }

    /**
     * @param string|null $between_streets
     */
    public function setBetweenStreets(?string $between_streets): void
    {
        $this->between_streets = $between_streets;
    }

    /**
     * @return string|null
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @param string|null $zip
     */
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return Carbon|null
     */
    public function getInscriptionDate(): ?Carbon
    {
        return $this->inscription_date;
    }

    public function setInscriptionDate(string $inscription_date = null): void
    {
        if ($inscription_date != null) {
            $this->inscription_date = Carbon::parse($inscription_date);
        } else $this->inscription_date = null;
    }
}

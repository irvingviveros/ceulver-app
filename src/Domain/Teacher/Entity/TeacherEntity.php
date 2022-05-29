<?php

namespace Domain\Teacher\Entity;

use Carbon\Carbon;

class TeacherEntity
{
    private ?string $rfc;
    private string $responsibility;
    private ?string $enrollment;
    private string $firstName;
    private ?string $middleName;
    private string $paternalSurname;
    private ?string $maternalSurname;
    private ?string $email;
    private ?string $phone;
    private ?string $address;
    private ?string $bloodGroup;
    private ?Carbon $birthDate;
    private ?Carbon $joiningDate;
    private ?Carbon $resignDate;
    private ?string $photo;
    private ?string $resume;
    private ?string $linkedinUrl;
    private ?string $otherInfo;
    private int $status;
    private ?string $nationalId;
    private int $schoolId;
    private int $userId;

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
     * @return int
     */
    public function getSchoolId(): int
    {
        return $this->schoolId;
    }

    /**
     * @param int $schoolId
     */
    public function setSchoolId(int $schoolId): void
    {
        $this->schoolId = $schoolId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string|null
     */
    public function getNationalId(): ?string
    {
        return $this->nationalId;
    }

    /**
     * @param string|null $nationalId
     */
    public function setNationalId(?string $nationalId): void
    {
        $this->nationalId = $nationalId;
    }

    /**
     * @return string|null
     */
    public function getRfc(): ?string
    {
        return $this->rfc;
    }

    /**
     * @param string|null $rfc
     */
    public function setRfc(?string $rfc): void
    {
        $this->rfc = $rfc;
    }

    /**
     * @return string
     */
    public function getResponsibility(): string
    {
        return $this->responsibility;
    }

    /**
     * @param string $responsibility
     */
    public function setResponsibility(string $responsibility): void
    {
        $this->responsibility = $responsibility;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    /**
     * @param string|null $middleName
     */
    public function setMiddleName(?string $middleName): void
    {
        $this->middleName = $middleName;
    }

    /**
     * @return string
     */
    public function getPaternalSurname(): string
    {
        return $this->paternalSurname;
    }

    /**
     * @param string $paternalSurname
     */
    public function setPaternalSurname(string $paternalSurname): void
    {
        $this->paternalSurname = $paternalSurname;
    }

    /**
     * @return string|null
     */
    public function getMaternalSurname(): ?string
    {
        return $this->maternalSurname;
    }

    /**
     * @param string|null $maternalSurname
     */
    public function setMaternalSurname(?string $maternalSurname): void
    {
        $this->maternalSurname = $maternalSurname;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
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
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getBloodGroup(): ?string
    {
        return $this->bloodGroup;
    }

    /**
     * @param string|null $bloodGroup
     */
    public function setBloodGroup(?string $bloodGroup): void
    {
        $this->bloodGroup = $bloodGroup;
    }

    /**
     * @return Carbon|null
     */
    public function getBirthDate(): ?Carbon
    {
        return $this->birthDate;
    }

    /**
     * @param Carbon|null $birthDate
     */
    public function setBirthDate(?Carbon $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return Carbon|null
     */
    public function getJoiningDate(): ?Carbon
    {
        return $this->joiningDate;
    }

    /**
     * @param Carbon|null $joiningDate
     */
    public function setJoiningDate(?Carbon $joiningDate): void
    {
        $this->joiningDate = $joiningDate;
    }

    /**
     * @return Carbon|null
     */
    public function getResignDate(): ?Carbon
    {
        return $this->resignDate;
    }

    /**
     * @param Carbon|null $resignDate
     */
    public function setResignDate(?Carbon $resignDate): void
    {
        $this->resignDate = $resignDate;
    }

    /**
     * @return string|null
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    /**
     * @param string|null $photo
     */
    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string|null
     */
    public function getResume(): ?string
    {
        return $this->resume;
    }

    /**
     * @param string|null $resume
     */
    public function setResume(?string $resume): void
    {
        $this->resume = $resume;
    }

    /**
     * @return string|null
     */
    public function getLinkedinUrl(): ?string
    {
        return $this->linkedinUrl;
    }

    /**
     * @param string|null $linkedinUrl
     */
    public function setLinkedinUrl(?string $linkedinUrl): void
    {
        $this->linkedinUrl = $linkedinUrl;
    }

    /**
     * @return string|null
     */
    public function getOtherInfo(): ?string
    {
        return $this->otherInfo;
    }

    /**
     * @param string|null $otherInfo
     */
    public function setOtherInfo(?string $otherInfo): void
    {
        $this->otherInfo = $otherInfo;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

}
<?php
declare(strict_types=1);

namespace Domain\Guardian\Entity;

class GuardianEntity
{
    private string $name;
    private ?string $last_name;
    private ?string $phone;
    private ?string $email;
    private ?string $address;
    private ?int $status;
    private int $user_id;
    private ?string $maternal_surname;
    private ?string $street_number;
    private ?string $neighborhood;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name = "N/A"): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     */
    public function setLastName(?string $last_name = "N/A"): void
    {
        $this->last_name = $last_name;
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
    public function setPhone(?string $phone = null): void
    {
        $this->phone = $phone;
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
    public function setEmail(?string $email = null): void
    {
        $this->email = $email;
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
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(?int $status = 1): void
    {
        $this->status = $status;
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
     * @return string|null
     */
    public function getMaternalSurname(): ?string
    {
        return $this->maternal_surname;
    }

    /**
     * @param string|null $maternal_surname
     */
    public function setMaternalSurname(?string $maternal_surname): void
    {
        $this->maternal_surname = $maternal_surname;
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
}

<?php
declare(strict_types=1);

namespace Domain\Receipt\Entity;

use DateTime;

class ReceiptEntity
{
    private string $reference;
    private ?int $sheet;
    private string $payment_method;
    private string $payment_concept;
    private float $amount;
    private string $amount_text;
    private ?DateTime $issued_date;
    private ?string $note;

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return int|null
     */
    public function getSheet(): ?int
    {
        return $this->sheet;
    }

    /**
     * @param int|null $sheet
     */
    public function setSheet(?int $sheet = null): void
    {
        $this->sheet = $sheet;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->payment_method;
    }

    /**
     * @param string $payment_method
     */
    public function setPaymentMethod(string $payment_method): void
    {
        $this->payment_method = $payment_method;
    }

    /**
     * @return string
     */
    public function getPaymentConcept(): string
    {
        return $this->payment_concept;
    }

    /**
     * @param string $payment_concept
     */
    public function setPaymentConcept(string $payment_concept): void
    {
        $this->payment_concept = $payment_concept;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getAmountText(): string
    {
        return $this->amount_text;
    }

    /**
     * @param string $amount_text
     */
    public function setAmountText(string $amount_text): void
    {
        $this->amount_text = $amount_text;
    }

    /**
     * @return DateTime|null
     */
    public function getIssuedDate(): ?DateTime
    {
        return $this->issued_date;
    }

    /**
     * @param DateTime|null $issued_date
     */
    public function setIssuedDate(?DateTime $issued_date = null): void
    {
        $this->issued_date = $issued_date;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     */
    public function setNote(?string $note = null): void
    {
        $this->note = $note;
    }
}

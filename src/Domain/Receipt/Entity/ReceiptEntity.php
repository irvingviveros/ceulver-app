<?php
declare(strict_types=1);

namespace Domain\Receipt\Entity;

use Domain\Receipt\Service\ReceiptService;
use Illuminate\Support\Carbon;
use Infrastructure\Receipt\Repository\EloquentReceiptRepository;

class ReceiptEntity
{
    public function __construct()
    {
        $this->receiptService = new ReceiptService(
            new EloquentReceiptRepository()
        );
    }

    private ReceiptService $receiptService;

    private string $reference;
    private ?int $sheet;
    private string $payment_method;
    private string $payment_concept;
    private float $amount;
    private string $amount_text;
    private ?Carbon $payment_date;
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
     * @param float|string $amount
     */
    public function setAmount(float|string $amount): void
    {
        if (is_string($amount))
            $amount = (float)$amount;

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
     * @param float|string $amount
     */
    public function setAmountText(float|string $amount): void
    {
        if (is_float($amount))
            $this->amount_text = $this->receiptService->moneyToText($amount);
        else
            $this->amount_text = $amount;
    }

    /**
     * @return Carbon|null
     */
    public function getPaymentDate(): ?Carbon
    {
        return $this->payment_date;
    }

    /**
     * @param string|null $payment_date
     */
    public function setPaymentDate(string|null $payment_date = null): void
    {
        $this->payment_date = Carbon::parse($payment_date);
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

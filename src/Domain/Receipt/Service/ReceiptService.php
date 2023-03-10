<?php
declare(strict_types=1);

namespace Domain\Receipt\Service;

use Domain\Receipt\Entity\ReceiptEntity;
use Domain\Shared\Exception\ValueNotFoundException;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

use Infrastructure\Receipt\Repository\EloquentReceiptRepository;

use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Luecano\NumeroALetras\NumeroALetras;

class ReceiptService
{
    private EloquentReceiptRepository $receiptRepository;

    public function __construct(EloquentReceiptRepository $receiptRepository)
    {
        $this->receiptRepository = $receiptRepository;
    }

    public function getAll(): Collection|array
    {
        return $this->receiptRepository->all();
    }

    public function createReceipt(ReceiptEntity $receiptEntity, $createdBy): int
    {
        $data = array(
            'sheet'             => $receiptEntity->getSheet(),
            'payment_method'    => $receiptEntity->getPaymentMethod(),
            'payment_concept'   => $receiptEntity->getPaymentConcept(),
            'amount'            => $receiptEntity->getAmount(),
            'amount_text'       => $receiptEntity->getAmountText(),
            'issued_date'       => $receiptEntity->getPaymentDate(),
            'note'              => $receiptEntity->getNote(),
            'created_by'        => $createdBy,
            'created_at'        => date_create(),
        );

        if (!$this->receiptRepository->create($data)) {
            return ResponseAlias::HTTP_BAD_REQUEST;
        }
        return ResponseAlias::HTTP_OK;
    }

    public function createGetId(ReceiptEntity $receiptEntity, $createdBy): int
    {
        $data = array(
            'sheet'             => $receiptEntity->getSheet(),
            'payment_method'    => $receiptEntity->getPaymentMethod(),
            'payment_concept'   => $receiptEntity->getPaymentConcept(),
            'payment_date'      => $receiptEntity->getPaymentDate(),
            'amount'            => $receiptEntity->getAmount(),
            'amount_text'       => $receiptEntity->getAmountText(),
            'note'              => $receiptEntity->getNote(),
            'created_at'        => date_create(),
            'created_by'        => $createdBy
        );

        return $this->receiptRepository->createGetId($data);
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $receipt = $this->receiptRepository->findById($id);

        if ($receipt == null) {
            throw new ValueNotFoundException(
                "El recibo no existe"
            );
        }

        return $receipt;
    }

    public function findOrFailWithTrashed($id)
    {
        $receipt = $this->receiptRepository->findOrFailWithTrashed($id);

        if ($receipt == null) {
            throw new ValueNotFoundException(
                "El recibo no existe"
            );
        }

        return $receipt;
    }

    public function update($receiptId, ReceiptEntity $receiptEntity, $modifiedBy)
    {
        // Get receipt model
        try {
            $receipt = $this->receiptRepository->findById($receiptId);
        } catch (ModelNotFoundException $exception) {
            //Send error message to Log
            Log::info($exception->getMessage());
            // Set guardian model to null
            return null;
        }

        $receipt->sheet             = $receiptEntity->getSheet();
        $receipt->payment_method    = $receiptEntity->getPaymentMethod();
        $receipt->payment_concept   = $receiptEntity->getPaymentConcept();
        $receipt->amount            = $receiptEntity->getAmount();
        $receipt->amount_text       = $receiptEntity->getAmountText();
        $receipt->payment_date      = $receiptEntity->getPaymentDate();
        $receipt->note              = $receiptEntity->getNote();
        $receipt->modified_by       = $modifiedBy;
        $receipt->updated_at        = date_create();

        if (!$this->receiptRepository->update($receipt))
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
        $receipt = $this->findById($id);

        $this->receiptRepository->delete($receipt);
    }

    public function with($relation){
        return $this->receiptRepository->with($relation);
    }

    public function moneyToText(Int|Float $number, $decimals = 2, $currency = 'pesos', $cents = 'centavos'): string
    {
        $formatter = new NumeroALetras();
        return $formatter->toMoney($number, $decimals, $currency, $cents);
    }

    public function getLastInsertId(): int
    {
        return $this->receiptRepository->lastInsertId();
    }
}

<?php
declare(strict_types=1);

namespace Domain\Receipt\Imports;

use Carbon\Carbon;
use Domain\Receipt\Service\ReceiptService;
use Infrastructure\Receipt\Model\Receipt;
use Infrastructure\Receipt\Repository\EloquentReceiptRepository;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ReceiptImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function __construct()
    {
        $this->receiptService = new ReceiptService(
            new EloquentReceiptRepository()
        );
    }

    private ReceiptService $receiptService;

    public function model(array $row): Receipt
    {
        // Get payment date value from file
        $paymentDate = Carbon::instance(Date::excelToDateTimeObject($row['fecha_pago']));
        // Get the amount and convert it to text
        $amountToText = $this->receiptService->moneyToText($row['importe']) ;

        return new Receipt(
            [
                'sheet'             => $row['folio'] ?? NULL,
                'payment_method'    => $row['metodo'],
                'amount'            => $row['importe'],
                'payment_concept'   => $row['concepto'],
                'amount_text'       => $amountToText,
                'payment_date'      => $paymentDate,
                'note'              => $row['nota_interna'],
                'created_by'        => auth()->id(),
                'updated_at'        => NULL
            ]
        );
    }

    public function onFailure(Failure ...$failures)
    {
        // TODO: Implement onFailure() method.
    }

    public function rules(): array
    {
        return ReceiptImportRules::$commonRules;
    }
}

<?php
declare(strict_types=1);

namespace Domain\StudentReceipt\Imports;

use Carbon\Carbon;
use Domain\Receipt\Imports\ReceiptImport;
use Domain\Receipt\Service\ReceiptService;
use Domain\StudentReceipt\Service\StudentReceiptService;
use Illuminate\Support\Collection;
use Infrastructure\Receipt\Model\Receipt;
use Infrastructure\Receipt\Repository\EloquentReceiptRepository;
use Infrastructure\StudentReceipt\Model\StudentReceipt;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class StudentReceiptImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function __construct()
    {
        $this->receiptService = new ReceiptService(
            new EloquentReceiptRepository()
        );

        $this->receiptImport = new ReceiptImport();
    }

    private ReceiptService $receiptService;
    private StudentReceiptService $studentReceiptService;
    private Receipt $receipt;
    private ReceiptImport $receiptImport;

    public function collection(Collection $rows)
    {
        // First, create the receipt, then, create the student receipt
        foreach ($rows as $row)
        {
            // Get payment date value from file
            $paymentDate = Carbon::instance(Date::excelToDateTimeObject($row['fecha_pago']));
            // Get the amount and convert it to text
            $amountToText = $this->receiptService->moneyToText($row['importe']) ;
            // Receipt creation
            Receipt::create(
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

            // Student receipt creation
            StudentReceipt::create(
                [
                    'sheet_id'          => $row['folio'] ?? NULL,
                    'receipt_id'        => $this->receiptService->getLastInsertId(),
                    'student_id'        => $row['id_alumno'],
                    'created_by'        => auth()->id(),
                    'updated_at'        => NULL
                ]
            );
        }
    }

    public function rules(): array
    {
        return StudentReceiptRules::$commonRules;
    }
}

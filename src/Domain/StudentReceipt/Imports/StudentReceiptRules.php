<?php
declare(strict_types=1);

namespace Domain\StudentReceipt\Imports;

class StudentReceiptRules
{
    static array $commonRules = [
        'folio'     => ['nullable', 'unique:student_receipts,sheet_id'],
        'id_alumno' => ['required']
    ];
}

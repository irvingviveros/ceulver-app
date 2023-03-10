<?php
declare(strict_types=1);

namespace Domain\Receipt\Imports;

class ReceiptImportRules
{
    static array $commonRules = [
        'folio'         => ['nullable', 'unique:receipts,sheet'],
        'metodo'        => ['required', 'string'],
        'concepto'      => ['required', 'string'],
        'importe'       => ['required'],
        'fecha_pago'    => ['nullable'],
        'nota_interna'  => ['nullable', 'string']
    ];
}

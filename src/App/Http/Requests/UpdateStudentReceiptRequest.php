<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateStudentReceiptRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sheet'                 => 'required',
            'payment_method'        => 'required|string|max:255',
            'payment_concept'       => 'required|string|max:255',
            'payment_date'          => 'required|date',
            'amount'                => 'required',
            'note'                  => 'nullable|string',
            'receipt_id'            => 'required',
            'student_id'            => 'required',
            'student_receipt_id'    => 'required'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'sheet'             => 'Folio',
            'payment_method'    => 'Método de pago',
            'payment_concept'   => 'Concepto de pago',
            'payment_date'      => 'Fecha de pago',
            'amount'            => 'Importe',
            'note'              => 'Nota',
            'receipt_id'        => 'ID del recibo',
            'student_id'        => 'ID del estudiante',
            'student_receipt_id' => 'ID del recibo del estudiante',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    /**
     * [failedValidation [Overriding the event validator for custom error response]]
     * @param Validator $validator [description]
     * @return void [object][object of various validation errors]
     */
    public function failedValidation(Validator $validator) {

        throw new HttpResponseException(
            response()->json($validator->errors(), 422)
        );
    }
}

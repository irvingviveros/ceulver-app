<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreStudentReceiptRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reference'         => 'required|max:255',
            'sheet'             => 'nullable|unique:receipts',
            'payment_method'    => 'required|string|max:255',
            'payment_concept'   => 'required|string|max:255',
            'payment_date'      => 'nullable|date',
            'amount'            => 'required',
            'note'              => 'nullable|string',
            'student_id'        => 'required',
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
            'reference'         => 'Referencia de pago',
            'sheet'             => 'Folio',
            'payment_method'    => 'Método de pago',
            'payment_concept'   => 'Concepto de pago',
            'payment_date'      => 'Fecha de pago',
            'amount'            => 'Importe',
            'note'              => 'Nota',
            'student_id'        => 'ID del estudiante',
        ];
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

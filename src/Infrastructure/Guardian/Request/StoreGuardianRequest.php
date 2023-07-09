<?php
declare(strict_types=1);

namespace Infrastructure\Guardian\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreGuardianRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:25',
            'last_name' => 'string|max:25',
            'paternal_surname' => 'nullable|string|max:25',
            'maternal_surname' => 'nullable|string|max:25',
            'phone' => 'nullable|string|max:10',
            'email' => 'nullable|email',
            'address' => 'nullable|string|max:255',
            'street_name' => 'nullable|string|max:255',
            'street_number' => 'nullable|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
            'status' => 'required|boolean'
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
            'name' => 'Nombre(s)',
            'last_name' => 'Apellido(s)',
            'paternal_surname' => 'Apellido Paterno',
            'maternal_surname' => 'Apellido Materno',
            'phone' => 'Teléfono celular',
            'email' => 'Correo electrónico',
            'address' => 'Dirección',
            'street_name' => 'Calle',
            'street_number' => 'No.',
            'neighborhood' => 'Colonia o fraccionamiento'
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

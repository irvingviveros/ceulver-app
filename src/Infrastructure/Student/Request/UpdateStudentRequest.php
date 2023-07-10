<?php
declare(strict_types=1);

namespace Infrastructure\Student\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateStudentRequest extends FormRequest
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
            'school_id'             => 'required',
            'paternal_surname'      => 'required|string|max:25',
            'maternal_surname'      => 'nullable|string|max:25',
            'first_name'            => 'required|string|max:35',
            'birth_date'            => 'required|date',
            'national_id'           => 'required|string|min:18|max:18|unique:students,national_id,'.$this->student_id,
            'address'               => 'nullable|string|max:250',
            'occupation'            => 'exclude_unless:educational_system,Universidad|string|max:100',
            'sex'                   => 'required|max:20',
            'marital_status'        => 'exclude_unless:educational_system,Universidad',
            'email'                 => 'exclude_if:email,null|required|email|exclude_unless:educational_system,Universidad',
            'phone'                 => 'sometimes|exclude_unless:educational_system,Universidad|max:10',
            'blood_group'           => 'required',
            'ailments'              => 'nullable|string|max:250',
            'allergies'             => 'nullable|string|max:250',
            'career'                => 'exclude_unless:educational_system,Universidad',
            'enrollment'            => 'exclude_unless:educational_system,Universidad|string',
            'payment_reference'     => 'nullable|string',
            'guardian_last_name'    => 'nullable|string|max:100',
            'guardian_first_name'   => 'required_if:guardian_last_name,!=|nullable|string|max:100',
            'guardian_paternal_surname' => 'required_if:guardian_first_name,!=|nullable|string|max:100',
            'guardian_maternal_surname' => 'required_if:guardian_first_name,!=|nullable|string|max:100',
            'guardian_relationship' => 'nullable|string',
            'guardian_address'      => 'nullable|string',
            'guardian_street_number' => 'nullable|string|max:255',
            'guardian_neighborhood' => 'nullable|string|max:255',
            'guardian_email'        => 'nullable|email',
            'guardian_phone'        => 'nullable|min:10|max:10',
//            'guardian_username'     => 'required_unless:educational_system,Universidad|unique:users,username'.$this->student_id,
//            'guardian_password'     => 'required_with:guardian_username',
            'student_username' => 'nullable', //TODO: need to work on user and password creation
            'student_password' => 'nullable', //TODO: need to work on user and password creation
//            'student_username'      => 'exclude_unless:educational_system,Universidad',
//            'student_password'      => 'required_with:student_username|unique:users,username'.$this->student_id,
            'student_status'        => 'required|boolean',
            'street_number'         => 'nullable|string|max:10',
            'neighborhood'          => 'nullable|string|max:75',
            'between_streets'       => 'nullable|string|max:200',
            'zip'                   => 'nullable|string|max:10',
            'city'                  => 'nullable|string|max:100',
            'state'                 => 'nullable|string|max:100',
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
            'school_id'             => 'Institución - Plantel',
            'paternal_surname'      => 'Apellido paterno',
            'maternal_surname'      => 'Apellido materno',
            'first_name'            => 'Nombre(s)',
            'national_id'           => 'CURP',
            'birth_date'            => 'Fecha de nacimiento',
            'occupation'            => 'Ocupación',
            'sex'                   => 'Sexo',
            'marital_status'        => 'Estado civil',
            'email'                 => 'Correo electrónico',
            'phone'                 => 'Teléfono celular',
            'blood_group'           => 'Tipo de sangre',
            'ailments'              => 'Padecimientos',
            'allergies'             => 'Alergias',
            'career'                => 'Carrera',
            'enrollment'            => 'Matrícula',
            'payment_reference'     => 'Referencia de pago',
            'guardian_last_name'    => 'Apellido padre o tutor',
            'guardian_first_name'   => 'Nombre padre o tutor',
            'guardian_paternal_surname' => 'Apellido Paterno',
            'guardian_maternal_surname' => 'Apellido Materno',
            'guardian_relationship' => 'Relación con padre o tutor',
            'guardian_address'      => 'Dirección padre o tutor',
            'guardian_street_number' => 'No.',
            'guardian_neighborhood' => 'Colonia o Fraccionamiento',
            'guardian_email'        => 'Correo electrónico de padre o tutor',
            'guardian_phone'        => 'Teléfono de padre o tutor',
            'guardian_username'     => 'Usuario de padre o tutor',
            'guardian_password'     => 'Contraseña de padre o tutor',
            'student_username'      => 'Usuario del alumno',
            'student_password'      => 'Contraseña del alumno',
            'student_status'        => 'Estatus del alumno',
            'educational_system'    => 'Sistema educacional',
            'street_name'           => 'Calle',
            'street_number'         => 'No.',
            'neighborhood'          => 'Colonia o fraccionamiento',
            'between_streets'       => 'Entre',
            'zip'                   => 'C.P.',
            'city'                  => 'Ciudad',
            'state'                 => 'Estado',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'occupation.prohibited_unless' => 'Elimine el contenido del campo :attribute, ubicado al seleccionar la universidad.',
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

<?php
declare(strict_types=1);

namespace Domain\Student\Imports;

class StudentImportRules
{
    /**
     * Common rules for all educational systems
     *
     * @return array
     */
    static array $commonRules =  [
        'apellido_paterno'      => ['required', 'string', 'max:25'],
        'apellido_materno'      => ['nullable', 'string', 'max:25'],
        'nombres'               => ['required', 'string', 'max:35'],
        'fecha_admision'        => ['nullable'],
        'fecha_nacimiento'      => ['required'],
        'curp'                  => ['required', 'unique:students,national_id', 'string', 'min:18', 'max:18'],
        'direccion'             => ['nullable', 'string', 'max:35'],
        'sexo'                  => ['required', 'string', 'max:20'],
        'grupo_sanguineo'       => ['required', 'string'],
        'padecimientos'         => ['nullable', 'string', 'max:250'],
        'alergias'              => ['nullable', 'string', 'max:250'],
        'referencia_de_pago'    => ['nullable', 'string'],
//        'tutor_relacion'        => 'required', 'string',
        'estatus'               => ['required', 'numeric'],
    ];

    /**
     * Rules that applies from maternal to high-school, except university.
     *
     * @return array
     */
    static array $maternalToHighSchoolRules = [
//        'guardian_username'     => 'required_unless:educational_system,Universidad', 'unique:users,username',
//        'guardian_password'     => 'required_with:guardian_username',
    ];

     static array $universityRules = [
         'carrera'               => ['required'],
         'matricula'             => ['required', 'string'],
         'ocupacion'             => ['required', 'string', 'max:100'],
         'estado_civil'          => ['required', 'string'],
//         'email'                 => ['required', 'email', 'unique:students,personal_email'],
         'email'                 => ['nullable', 'email', 'unique:students,personal_email'], // bypass rule
         'telefono_celular'      => ['required', 'numeric'],
//         'student_username'      => 'required', 'string',
//         'student_password'      => 'required_with:student_username|unique:users,username',
     ];
}

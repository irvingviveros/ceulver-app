<?php

namespace Domain\Student\Imports;

use Carbon\Carbon;
use Domain\Student\Service\StudentService;
use Illuminate\Validation\Rule;
use Infrastructure\Student\Model\Student;
use Infrastructure\Student\Repository\EloquentStudentRepository;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class StudentsImport implements ToModel, WithHeadingRow
{
    private StudentService $studentService;

    public function __construct()
    {
        $this->studentService = new StudentService(
            new EloquentStudentRepository()
        );
    }

    /**
    * @param array $row
    *
    * @return Student
     */
    public function model(array $row): Student
    {
        // Get birthday value from file
        $studentAge = Carbon::instance(Date::excelToDateTimeObject($row['fecha_de_nacimiento']));

        return new Student([
            'school_id'                 => auth()->id(),
            'national_id'               => $row['curp'],
            'enrollment'                => $row['matricula'] ?? NULL,
            'admission_no'              => $row['id_admision'] ?? NULL,
            'admission_date'            => $row['fecha_admision'] ?? NULL,
            'payment_reference'         => $row['referencia_de_pago'] ?? NULL,
            'first_name'                => $row['nombres'],
            'paternal_surname'          => $row['apellido_paterno'],
            'maternal_surname'          => $row['apellido_materno'] ?? NULL,
            'birth_date'                => $studentAge,
            'age'                       => $this->studentService->calculateAge($studentAge),
            'occupation'                => $row['ocupacion'],
            'address'                   => $row['direccion'],
            'personal_email'            => $row['email'] ?? NULL,
            'personal_phone'            => $row['telefono_celular'] ?? NULL,
            'marital_status'            => $row['estado_civil'],
            'sex'                       => $row['sexo'],
            'blood_group'               => $row['grupo_sanguineo'] ?? NULL,
            'allergies'                 => $row['alergias'],
            'ailments'                  => $row['padecimientos'],
            'status'                    => 1,
            'created_by'                => auth()->id()
        ]);
    }

    /**
     * Store a newly created resource in storage from CSV/Excel.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            '1' => Rule::in(['patrick@maatwebsite.nl']),

            // Above is alias for as it always validates in batches
            '*.1' => Rule::in(['patrick@maatwebsite.nl']),

            // Can also use callback validation rules
            '0' => function($attribute, $value, $onFailure) {
                if ($value !== 'Patrick Brouwers') {
                    $onFailure('Name is not Patrick Brouwers');
                }
            }
        ];
    }
}
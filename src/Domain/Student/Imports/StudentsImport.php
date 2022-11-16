<?php
declare(strict_types=1);

namespace Domain\Student\Imports;

use Domain\School\Service\SchoolService;
use Domain\Student\Service\StudentService;

use Infrastructure\School\Repository\EloquentSchoolRepository;
use Infrastructure\Student\Model\Student;
use Infrastructure\Student\Repository\EloquentStudentRepository;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class StudentsImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    private StudentService $studentService;
    private SchoolService $schoolService;
    private int $userSchool;
    private mixed $school;
    private string $educationalSystem;

    public function __construct()
    {
        $this->studentService = new StudentService(
            new EloquentStudentRepository()
        );
        $this->schoolService = new SchoolService(
            new EloquentSchoolRepository()
        );
        // Get school ID from user
        $this->userSchool = auth()->user()->school_id;
        // Get school collection data
        $this->school = $this->schoolService->findById($this->userSchool);
        // Get educational system name
        $this->educationalSystem = $this->school->educationalSystem->name;
    }

    /**
    * @param array $row
    *
    * @return Student
     */
    public function model(array $row): Student
    {
        // Get birthday value from file
        $studentAge = Carbon::instance(Date::excelToDateTimeObject($row['fecha_nacimiento']));
        $admissionDate = Carbon::instance(Date::excelToDateTimeObject($row['fecha_admision']));

        return new Student([
            'school_id'                 => $this->userSchool,
            'national_id'               => $row['curp'],
            'enrollment'                => $row['matricula'] ?? NULL,
            'career_id'                 => $row['carrera'] ?? NULL,
            'admission_date'            => $admissionDate ?? NULL,
            'payment_reference'         => $row['referencia_pago'] ?? NULL,
            'first_name'                => $row['nombres'],
            'paternal_surname'          => $row['apellido_paterno'],
            'maternal_surname'          => $row['apellido_materno'] ?? NULL,
            'birth_date'                => $studentAge,
            'age'                       => $this->studentService->calculateAge($studentAge),
            'occupation'                => $row['ocupacion'],
            'address'                   => $row['direccion'] ?? NULL,
            'personal_email'            => $row['email'] ?? NULL,
            'personal_phone'            => $row['telefono_celular'] ?? NULL,
            'marital_status'            => $row['estado_civil'],
            'sex'                       => $row['sexo'],
            'blood_group'               => $row['grupo_sanguineo'] ?? NULL,
            'allergies'                 => $row['alergias'],
            'ailments'                  => $row['padecimientos'],
//            'guardian_relationship'     => $row['tutor_relacion'],
            'status'                    => $row['estatus'],
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
        // If educational system is university, then add the university rules for cells.
        if ($this->educationalSystem !== 'Universidad') {
            return array_merge(StudentImportRules::$commonRules, StudentImportRules::$maternalToHighSchoolRules);
        } else return array_merge(StudentImportRules::$commonRules, StudentImportRules::$universityRules);
    }
}

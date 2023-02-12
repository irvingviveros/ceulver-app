<?php
declare(strict_types=1);

namespace App\Student\Controller;

use App\Http\Controllers\Controller;

use Domain\Career\Service\CareerService;
use Domain\Guardian\Entity\GuardianEntity;
use Domain\Guardian\Service\GuardianService;
use Domain\School\Service\SchoolService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Student\Entity\StudentEntity;
use Domain\Student\Imports\StudentsImport;
use Domain\Student\Service\StudentService;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

use Infrastructure\Career\Repository\EloquentCareerRepository;
use Infrastructure\Guardian\Repository\EloquentGuardianRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;
use Infrastructure\Student\Model\Student;
use Infrastructure\Student\Repository\EloquentStudentRepository;
use Infrastructure\Student\Request\StoreStudentRequest;
use Infrastructure\Student\Request\UpdateStudentRequest;

use Maatwebsite\Excel\Exceptions\NoFilePathGivenException;
use Mockery\CountValidator\Exception;
use Brian2694\Toastr\Facades\Toastr;

class StudentController extends Controller
{
    private StudentService $studentService;
    private GuardianService $guardianService;
    private SchoolService $schoolService;
    private CareerService $careerService;

    public function __construct()
    {
        $this->studentService = new StudentService(
            new EloquentStudentRepository()
        );

        $this->guardianService = new GuardianService(
            new EloquentGuardianRepository()
        );

        $this->schoolService = new SchoolService(
            new EloquentSchoolRepository()
        );

        $this->careerService = new CareerService(
            new EloquentCareerRepository()
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        // Initialize variables
        $students = $this->studentService->getAll();

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Alumnos"],
            ['name' => "Administración de alumnos"]
        ];

        return view('modules.student.index',
            ['breadcrumbs' => $breadcrumbs], compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $schools = $this->schoolService->orderBy('id', 'desc');
        $careers = $this->careerService->orderBy('name');

        return view('modules.student.actions.modal-add-student', compact(['schools', 'careers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStudentRequest $request
     * @return Response
     * @throws \Exception
     */
    public function store(StoreStudentRequest $request): Response
    {
        // Declare entities
        $studentEntity = new StudentEntity();
        // Declare new Guardian object
        $guardianEntity = new GuardianEntity();

        // Request current user data
        $user = auth()->user();
        $createdBy = $user->id;

        // Retrieve the validated input data...
        $validatedRequest = $request->validated();

        // Request and set data for student
        $studentEntity->setSchoolId((int)$validatedRequest['school_id']);
        $studentEntity->setPaternalSurname($validatedRequest['paternal_surname']);
        $studentEntity->setMaternalSurname($validatedRequest['maternal_surname']);
        $studentEntity->setFirstName($validatedRequest['first_name']);
        $studentEntity->setBirthDate($validatedRequest['birth_date']);
        $studentEntity->setNationalId($validatedRequest['national_id']);
        $studentEntity->setNationality('Mexicana');
        $studentEntity->setAddress($validatedRequest['address']);
        $studentEntity->setOccupation($validatedRequest['occupation'] ?? null);
        $studentEntity->setSex($validatedRequest['sex']);
        $studentEntity->setMaritalStatus($validatedRequest['marital_status'] ?? null);
        $studentEntity->setPersonalEmail($validatedRequest['email'] ?? null);
        $studentEntity->setPersonalPhone($validatedRequest['phone'] ?? null);
        $studentEntity->setBloodGroup($validatedRequest['blood_group']);
        $studentEntity->setAilments($validatedRequest['ailments']);
        $studentEntity->setAllergies($validatedRequest['allergies']);
        $studentEntity->setCareerId((int)($validatedRequest['career'] ?? null));
        $studentEntity->setEnrollment($validatedRequest['enrollment'] ?? null);
        $studentEntity->setPaymentReference($validatedRequest['payment_reference'] ?? null);
        $studentEntity->setGuardianRelationship($validatedRequest['guardian_relationship']);
        $studentEntity->setStatus((int)$validatedRequest['student_status']);
        $studentEntity->setAge($this->studentService->calculateAge($studentEntity->getBirthDate()));
        $studentEntity->setUserId(1); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
//        $studentEntity->setAgreementId(1); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
//        $studentEntity->setEnrollment('TEST'); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno

        // Guardian info
        // Request and set data for guardian
        $guardianEntity->setName($validatedRequest['guardian_first_name']);
        $guardianEntity->setLastName($validatedRequest['guardian_last_name']);
        $guardianEntity->setAddress($validatedRequest['guardian_address'] ?? null);
        $guardianEntity->setEmail($validatedRequest['guardian_email'] ?? null);
        $guardianEntity->setPhone($validatedRequest['guardian_phone'] ?? null);
        $guardianEntity->setStatus(1);
        $guardianEntity->setUserId(5);

        // Request guardian id and save it
        $guardianId = $this->guardianService->createGetId($guardianEntity, $createdBy);

        // Set guardian ID into student entity
        $studentEntity->setGuardianId($guardianId ?? null);

        // Create new student
        try {
            $response = $this->studentService->createStudent(
                $studentEntity, $createdBy
            );
            return response($response);

        } catch (Exception $ex) {

            Log::info($ex->getMessage());   //Send error message to Log
            return response("Error del interno del servidor", 500);
        }
    }

    /**
     * Show the profile for a given user.
     *
     * @param int $id
     * @return View
     * @throws ValueNotFoundException
     */
    public function show(int $id): View
    {
        // Get student data model
        $student = $this->studentService->findById($id);
        // Get school data model from the student.
        $school = $this->schoolService->findById($student->school_id);
        // Get guardian data from the student
        $guardian = $this->guardianService->findById($student->guardian_id);

        if (is_null($guardian)) {

            if ($school->educationalSystem->name === 'Universidad') {
                Toastr::warning(
                    'No hay datos de la referencia de contacto',
                    'Advertencia',
                    ["positionClass" => "toast-top-right"]) ;
            } else {
                Toastr::warning(
                    'No hay registros del padre o tutor',
                    'Advertencia',
                    ["positionClass" => "toast-top-right"]);
            }

        }

        return view('modules.student.actions.modal-show-student', compact(['school', 'student', 'guardian']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     * @throws ValueNotFoundException
     */
    public function edit(int $id): View
    {
        $student = null;

        // Get student data model
        try {
            $student = $this->studentService->findById($id);
        } catch (Exception $exception) {
            Log::info($exception->getMessage());
        }

        // Get school data model from the student.
        $school = $this->schoolService->findById($student->school_id);
        // Get careers
        $careers = $this->careerService->getAll();
        // Get guardian data from the student
        $guardian = $this->guardianService->findById($student->guardian_id);

        return view(
            'modules.student.actions.modal-edit-student',
            compact(['student', 'school', 'careers', 'guardian'])
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Student $student
     * @return Response
     */
    public function update(UpdateStudentRequest $request)
    {
        // Declare entities
        $studentEntity = new StudentEntity();
        // Declare new Guardian object
        $guardianEntity = new GuardianEntity();

        // Request current user data
        $user = auth()->user();
        $modifiedBy = $user->id;

        // Retrieve the validated input data...
        $validatedRequest = $request->validated();

        // Request and set data for student
        $studentId = $request->input('student_id');
        $guardianId = $request->input('guardian_id');
        $studentEntity->setSchoolId((int)$validatedRequest['school_id']);
        $studentEntity->setPaternalSurname($validatedRequest['paternal_surname']);
        $studentEntity->setMaternalSurname($validatedRequest['maternal_surname']);
        $studentEntity->setFirstName($validatedRequest['first_name']);
        $studentEntity->setBirthDate($validatedRequest['birth_date']);
        $studentEntity->setNationalId($validatedRequest['national_id']);
        $studentEntity->setNationality();
        $studentEntity->setAddress($validatedRequest['address']);
        $studentEntity->setOccupation($validatedRequest['occupation'] ?? null);
        $studentEntity->setSex($validatedRequest['sex']);
        $studentEntity->setMaritalStatus($validatedRequest['marital_status'] ?? null);
        $studentEntity->setPersonalEmail($validatedRequest['email'] ?? null);
        $studentEntity->setPersonalPhone($validatedRequest['phone'] ?? null);
        $studentEntity->setBloodGroup($validatedRequest['blood_group']);
        $studentEntity->setAilments($validatedRequest['ailments']);
        $studentEntity->setAllergies($validatedRequest['allergies']);
        $studentEntity->setCareerId((int)($validatedRequest['career'] ?? null));
        $studentEntity->setEnrollment($validatedRequest['enrollment'] ?? null);
        $studentEntity->setPaymentReference($validatedRequest['payment_reference'] ?? null);
        $studentEntity->setGuardianRelationship($validatedRequest['guardian_relationship']);
        $studentEntity->setStatus((int)$validatedRequest['student_status']);
        $studentEntity->setAge($this->studentService->calculateAge($studentEntity->getBirthDate()));
//        $studentEntity->setUserId(1); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
//        $studentEntity->setAgreementId(1); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
//        $studentEntity->setEnrollment('TEST'); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
//        $studentEntity->setGuardianId($guardianId ?? null);

        // Guardian info
        // Request and set data for guardian
        $guardianEntity->setName($validatedRequest['guardian_first_name']);
        $guardianEntity->setLastName($validatedRequest['guardian_last_name']);
        $guardianEntity->setAddress($validatedRequest['guardian_address'] ?? null);
        $guardianEntity->setEmail($validatedRequest['guardian_email'] ?? null);
        $guardianEntity->setPhone($validatedRequest['guardian_phone'] ?? null);
        $guardianEntity->setStatus(1);
//        $guardianEntity->setUserId(5);

        // Update student
        $this->guardianService->update($guardianId, $guardianEntity, $modifiedBy);

        // Update student
        try {
            $response = $this->studentService->update($studentId, $studentEntity, $modifiedBy);
            return response($response);

        } catch (Exception $ex) {

            Log::info($ex->getMessage());   //Send error message to Log
            return response("Error del interno del servidor", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Integer $studentId
     */
    public function destroy(int $studentId)
    {
        try {
            $this->studentService->delete($studentId);
        } catch (OperationNotPermittedCeulverException $exception) {
            return new Response($exception->getMessage(), 400);
        } catch (Exception $exception) {
            return new Response('Error interno en el servidor', 500);
        }
    }

    /**
     *
     * @return View
     */
    public function getList(): View
    {
        // Initialize variables
        $students = $this->studentService->getAll();

        return view('modules.student.list.list', compact('students'));
    }

    /**
     * Store a newly created resource in storage from CSV/Excel.
     *
     * @param StoreStudentRequest $request
     * @return RedirectResponse
     * @throws ValueNotFoundException
     */
    public function storeBulkImport(Request $request): RedirectResponse
    {
        // Get selected school id
        $schoolId = (int)$request->input('selectSchool');

        // Create new StudentImport object
        $import = new StudentsImport($schoolId);


        // Validates if the user submitted a file
        try {
            // Validate if the file is xlsx or csv
            $request->validate(['import_file' => ['mimes:xlsx,csv']]);
            // Import and save
            $import->import($request->file('import_file'));
        } catch (NoFilePathGivenException $e) {
            return back()->with('error', 'Error. No se ha seleccionado ningún archivo.');
        }

        if ($import->failures()->isNotEmpty()) {
            Toastr::warning(
                'Hubo un error al intentar cargar los registros.',
                'Advertencia',
                ["positionClass" => "toast-top-right"]);
            return back()->with('failures', $import->failures());
        } else {
            Toastr::success(
                'Registros importados correctamente.',
                'Éxito',
                ["positionClass" => "toast-top-right"]);
            return back()->with('success', 'Los registros se han importado correctamente.');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function createBulkImport(): View
    {
        $schools = $this->schoolService->orderBy('id', 'desc');

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Alumnos"],
            ['name' => "Carga masiva de estudiantes"]
        ];

        return view('modules.student.bulk.bulk-upload',
            ['breadcrumbs' => $breadcrumbs], compact('schools'));
    }
}

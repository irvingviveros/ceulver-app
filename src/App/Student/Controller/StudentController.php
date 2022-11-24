<?php
declare(strict_types=1);

namespace App\Student\Controller;

use Brian2694\Toastr\Facades\Toastr;
use Domain\Career\Service\CareerService;
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

use App\Http\Controllers\Controller;

use Infrastructure\Student\Model\Student;
use Infrastructure\Student\Repository\EloquentStudentRepository;
use Infrastructure\Student\Request\StoreStudentRequest;
use Infrastructure\Career\Repository\EloquentCareerRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;

use Maatwebsite\Excel\Exceptions\NoFilePathGivenException;
use Mockery\CountValidator\Exception;

class StudentController extends Controller
{
    private StudentService $studentService;
    private SchoolService $schoolService;
    private CareerService $careerService;

    public function __construct()
    {
        $this->studentService = new StudentService(
            new EloquentStudentRepository()
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
     */
    public function store(StoreStudentRequest $request): Response
    {
        // Declare new Student object
        $studentEntity = new StudentEntity();
        // Declare new Guardian object
        // TODO: Create guardian entity

        // Request current user data
        $user = auth()->user();
        $createdBy  = $user->id;

        // Retrieve the validated input data...
        $validatedRequest = $request->validated();

        // Request and set data for student
        $studentEntity->setSchoolId((int)$validatedRequest['school_id']);
        $studentEntity->setPaternalSurname($validatedRequest['paternal_surname']);
        $studentEntity->setMaternalSurname($validatedRequest['maternal_surname']);
        $studentEntity->setFirstName($validatedRequest['first_name']);
        $studentEntity->setBirthDate($validatedRequest['birth_date']);
        $studentEntity->setNationalId($validatedRequest['national_id']);
        $studentEntity->setAddress($validatedRequest['address']);
        $studentEntity->setOccupation($validatedRequest['occupation']  ?? null);
        $studentEntity->setSex($validatedRequest['sex']);
        $studentEntity->setMaritalStatus($validatedRequest['marital_status'] ?? null);
        $studentEntity->setPersonalEmail($validatedRequest['email'] ?? null);
        $studentEntity->setPersonalPhone($validatedRequest['phone'] ?? null);
        $studentEntity->setBloodGroup($validatedRequest['blood_group']);
        $studentEntity->setAilments($validatedRequest['ailments']);
        $studentEntity->setAllergies($validatedRequest['allergies']);
        $studentEntity->setCareerId((int)($validatedRequest['career'] ?? null));
        $studentEntity->setEnrollment($validatedRequest['enrollment'] ?? null);
        $studentEntity->setPaymentReference($validatedRequest['payment_reference']);
        $studentEntity->setGuardianRelationship($validatedRequest['guardian_relationship']);
        $studentEntity->setStatus((int)$validatedRequest['student_status']);
        $studentEntity->setAge($this->studentService->calculateAge($studentEntity->getBirthDate()));
        $studentEntity->setUserId(1); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
//        $studentEntity->setAgreementId(1); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
//        $studentEntity->setGuardianId(1); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
//        $studentEntity->setEnrollment('TEST'); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno

        // Guardian info
        // Request and set data for user
        // TODO: Gather guardian info

        // Create new student
        try {
            $response = $this->studentService->createStudent(
                $studentEntity, $createdBy
            );
            return response($response);

        } catch(OperationNotPermittedCeulverException $cop) {
            return response($cop->getMessage(), 400);
        } catch(Exception $ex) {

            Log::info($ex->getMessage());   //Send error message to Log

            return response("Error del interno del servidor", 500);
        }
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Get student data model
        $student = $this->studentService->findById($id);
        // Get school data model from the student.
        $school = $this->schoolService->findById($student->school_id);

        return view('modules.student.actions.modal-show-student', compact(['school', 'student']));
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

        if ($id > 0) {
            try {
                $student = $this->studentService->findById($id);
            } catch (Exception $exception) {
                Log::info($exception->getMessage());
            }
        }

        return view(
            'modules.academics.academicYear.actions.modal-edit-academicYear', compact(['student'])
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Student $student
     * @return Response
     */
    public function update(Request $request, Student $student)
    {
        //
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
            $import->import($request->file('import_file'));
            // Validate if the file is xlsx or csv
            $request->validate(['import_file' => ['mimes:xlsx,csv']]);
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

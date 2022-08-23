<?php
declare(strict_types=1);

namespace App\Student\Controller;

use Carbon\Carbon;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Student\Entity\StudentEntity;
use Domain\Student\Service\StudentService;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

use App\Http\Controllers\Controller;

use Infrastructure\Career\Repository\EloquentCareerRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;
use Infrastructure\Student\Model\Student;
use Infrastructure\Student\Repository\EloquentStudentRepository;

class StudentController extends Controller
{
    private StudentService $studentService;

    public function __construct()
    {
        $this->studentService = new StudentService(
            new EloquentStudentRepository()
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
        $schoolRepository = new EloquentSchoolRepository();
        $careersRepository = new EloquentCareerRepository();
        $schools = $schoolRepository->with('educationalSystems');
        $careers = $careersRepository->orderBy('name');
        return view('modules.student.actions.modal-add-student', compact(['schools', 'careers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Declare new Student object
        $studentEntity = new StudentEntity();
        // Declare new Guardian object
        // TODO: Create guardian entity

        // Request current user data
        $user = auth()->user();
        $createdBy  = $user->id;
        $modifiedBy = $user->id;

        // Student info
        // Request and set data
        $birth_date = Carbon::parse($request->input('birth_date'));

        $studentEntity->setSchoolId((int)$request->input('school_id'));
        $studentEntity->setPaternalSurname($request->input('paternal_surname'));
        $studentEntity->setMaternalSurname($request->input('maternal_surname'));
        $studentEntity->setFirstName($request->input('first_name'));
        $studentEntity->setBirthDate($birth_date);
        $studentEntity->setNationalId($request->input('national_id'));
        $studentEntity->setAddress($request->input('address'));
        $studentEntity->setOccupation($request->input('occupation'));
        $studentEntity->setSex($request->input('sex'));
        $studentEntity->setPersonalEmail($request->input('email'));
        $studentEntity->setPersonalPhone($request->input('personal_phone'));
        $studentEntity->setBloodGroup($request->input('blood_group'));
        $studentEntity->setAilments($request->input('ailments'));
        $studentEntity->setAllergies($request->input('allergies'));
        $studentEntity->setCareerId((int)$request->input('career'));
        $studentEntity->setUserId(1); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
//        $studentEntity->setAgreementId(1); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
//        $studentEntity->setGuardianId(1); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
//        $studentEntity->setEnrollment('TEST'); // TODO: Cambiar esto, es de prueba. Se debe crear un usuario al crear alumno
        $studentEntity->setStatus((int)$request->input('student_status'));

        // Guardian info
        // Request and set data
        // TODO: Gather guardian info

        // Create new student
        try {
            $id = $this->studentService->create(
                $studentEntity, $createdBy, $modifiedBy
            );
            return response($id, 200);

        } catch(OperationNotPermittedCeulverException $cop) {
            return response($cop->getMessage(), 400);
        } catch(Exception $ex) {

            Log::info($ex->getMessage());   //Send error message to Log

            return response("Error del interno del servidor", 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     * @throws \Domain\Shared\Exception\ValueNotFoundException
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
}

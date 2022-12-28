<?php
declare(strict_types=1);

namespace App\StudentReceipt\Controller;

use App\Http\Controllers\Controller;
use Domain\Receipt\Service\ReceiptService;
use Domain\School\Service\SchoolService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Student\Actions\CreateFullName;
use Domain\Student\Service\StudentService;
use Domain\StudentReceipt\Actions\DateToLatinAmericaFormat;
use Domain\StudentReceipt\Service\StudentReceiptService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Infrastructure\Receipt\Repository\EloquentReceiptRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;
use Infrastructure\Student\Repository\EloquentStudentRepository;
use Infrastructure\StudentReceipt\Model\StudentReceipt;
use Infrastructure\StudentReceipt\Repository\EloquentStudentReceiptRepository;
use Mockery\CountValidator\Exception;

class StudentReceiptController extends Controller
{
    private ReceiptService $receiptService;
    private StudentReceiptService $studentReceiptService;
    private StudentService $studentService;
    private SchoolService $schoolService;

    public function __construct()
    {
        $this->receiptService = new ReceiptService(
            new EloquentReceiptRepository()
        );

        $this->studentReceiptService = new StudentReceiptService(
            new EloquentStudentReceiptRepository()
        );

        $this->studentService = new StudentService(
            new EloquentStudentRepository()
        );

        $this->schoolService = new SchoolService(
            new EloquentSchoolRepository()
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

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Coordinación académica"],
            ['name' => "Administración de recibos"]
        ];

        return view('modules.accounting.receipts.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StudentReceipt $studentReceipt
     * @return Response
     */
    public function edit(StudentReceipt $studentReceipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param StudentReceipt $studentReceipt
     * @return Response
     */
    public function update(Request $request, StudentReceipt $studentReceipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $receiptId
     * @return Response
     */
    public function destroy(int $receiptId)
    {
        try {
            $this->studentService->delete($receiptId);
        } catch (OperationNotPermittedCeulverException $exception) {
            return new Response($exception->getMessage(), 400);
        } catch (Exception $exception) {
            return new Response('Error interno en el servidor', 500);
        }
    }

    /**
     * Show the form for creating a new resource by educational system
     *
     * @return View
     */
    public function createWithEducationalSystem(string $educationalSystem): View
    {
        // Get educational system name from DB
        $educationalSystemName = $this->getEducationalSystemName($educationalSystem);

        // Retrieve the currently authenticated user
        $currentUser = auth()->user();
        // Retrieve the school associated with the user
        $school = $currentUser->school;
        // Retrieve all students from current school
        $students = $this->studentService->getAll();
        // Retrieve last receipt sheet
        $lastSheet = $this->studentReceiptService->lastReceiptId();

        return view('modules.accounting.receipts.actions.modal-add-student-receipt', compact(['students', 'school', 'lastSheet']));
    }

    public function receiptsWithEducationalSystem(string $educationalSystem): View
    {
        // Retrieve the currently authenticated user
        $currentUser = auth()->user();
        // Retrieve current school receipts
        $receipts = $this->studentReceiptService->getAllBySchoolId($currentUser->school->id);
        // Retrieve the URL of the educational system
        $educationalSystemName = $this->getEducationalSystemName($educationalSystem);

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => route('accounting.dashboard'), 'name' => "Coordinación administrativa"],
            ['name' => "Administración de recibos - ".$educationalSystemName]
        ];

        return view('modules.accounting.receipts.index', compact(['breadcrumbs', 'educationalSystemName']));
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     * @throws ValueNotFoundException
     */
    public function showByEducationalSystem(string $educationalSystem, int $id): View
    {
        // Get receipt data model
        $baseReceipt = $this->receiptService->findById($id);
        // Receipt payment date formatted
        $payment_date = DateToLatinAmericaFormat::execute($baseReceipt->payment_date);
        // Get student-receipt data model with the receipt id
        $studentReceipt = $this->studentReceiptService->findById($id);
        // Get student data model related to the receipt
        $student = $this->studentService->findById($studentReceipt->student_id);
        // Get student full name by paternal surname
        $student_name = CreateFullName::ByPaternalSurname(
            $student->first_name, $student->paternal_surname, $student->maternal_surname);
        // Get school data model related to the student
        $school = $this->schoolService->findById($student->school_id);

        return view('modules.accounting.receipts.actions.modal-show-student-receipt',
            compact(['baseReceipt', 'studentReceipt', 'student', 'school', 'payment_date', 'student_name']));
    }

    /**
     * @param string $educationalSystem
     * @return string
     */
    public function getEducationalSystemName(string $educationalSystem): string
    {
        $educationalSystemName = match ($educationalSystem) {
            'university' => 'Universidad',
            'bachelor' => 'Bachillerato',
            'high-school' => 'Secundaria',
            'elementary-school' => 'Primaria',
            'kindergarten' => 'Jardín de niños',
            'nursery-school' => 'Maternal'
        };
        return $educationalSystemName;
    }
}

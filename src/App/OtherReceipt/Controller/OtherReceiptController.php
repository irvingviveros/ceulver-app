<?php

namespace App\OtherReceipt\Controller;

use App\Http\Controllers\Controller;
use Domain\OtherReceipt\Entity\OtherReceiptEntity;
use Domain\OtherReceipt\Service\OtherReceiptService;
use Domain\Receipt\Entity\ReceiptEntity;
use Domain\Receipt\Service\ReceiptService;
use Domain\School\Service\SchoolService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Student\Actions\CreateFullName;
use Domain\Student\Service\StudentService;
use Domain\StudentReceipt\Actions\DateToLatinAmericaFormat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Infrastructure\OtherReceipt\Model\OtherReceipt;
use Infrastructure\OtherReceipt\Repository\EloquentOtherReceiptRepository;
use Infrastructure\Receipt\Repository\EloquentReceiptRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;
use Infrastructure\Student\Repository\EloquentStudentRepository;
use Mockery\CountValidator\Exception;


class OtherReceiptController extends Controller
{
    private ReceiptService $receiptService;
    private OtherReceiptService $otherReceiptService;
    private StudentService $studentService;
    private SchoolService $schoolService;

    public function __construct()
    {
        $this->otherReceiptService = new OtherReceiptService(
            new EloquentOtherReceiptRepository()
        );

        $this->receiptService = new ReceiptService(
            new EloquentReceiptRepository()
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
        // Get user's school code associated
        $companyId = auth()->user()->company()->id;

        // Breadcrumbs
        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => route('accounting.dashboard'), 'name' => "Coordinación administrativa"],
            ['name' => "Administración de recibos - Otros"]
        ];

        return view('modules.accounting.other_receipts.index', compact(['breadcrumbs', 'companyId']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        // Retrieve the currently authenticated user
        $currentUser = auth()->user();
        // Get user schools associated
        $schools = $currentUser->company()->schools;
        // Retrieve last receipt sheet with acronym and add + 1 for a new receipt
        $lastSheetWithAcronym = $this->otherReceiptService->createSheetWithAcronym();
        // Retrieve last receipt sheet and add + 1 for a new receipt
        $lastSheet = $this->otherReceiptService->lastSheetId() + 1;
        // Get user's school code associated
        $companyId = $currentUser->company()->id;

        return view('modules.accounting.other_receipts.actions.modal-add-other-receipt',
            compact(['schools', 'lastSheet', 'lastSheetWithAcronym', 'companyId'])
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Declare entities
        $receiptEntity = new ReceiptEntity();
        $otherReceiptEntity = new OtherReceiptEntity();

        // Request current user data
        $user = auth()->user();
        $createdBy = $user->id;

        $receiptEntity->setSheet($request['sheet']);
        $receiptEntity->setPaymentMethod($request['payment_method']);
        $receiptEntity->setPaymentConcept($request['payment_concept']);
        $receiptEntity->setPaymentDate($request['payment_date']);
        $receiptEntity->setAmount($request['amount']);
        $receiptEntity->setAmountText($receiptEntity->getAmount());
        $receiptEntity->setNote($validatedRequest['note'] ?? null);

        // Request and set data for receipt
        $receiptId = $this->receiptService->createGetId($receiptEntity, $createdBy);
        $school_id = null;

        // Other receipt
        if ($request['student_id'] != null && $request['person_educational_level'] == null) {
            $student = $this->studentService->findById($request['student_id']);
            $school_id = $student->school->id;
        } elseif ($request['person_educational_level'] != null && $request['student_id'] == null) {
            $school = $this->schoolService->getAllByEducationalSystem($request['person_educational_level']);
            // Parse the JSON string into an array
            $array = json_decode($school, true);
            // Access the 'id' property
            $school_id = $array[0]['id'];
        } else {
            return response("No se permite la combinación de persona y alumno. Por favor, recargue la página.", 400);
        }

        $otherReceiptEntity->setSheetId($request['sheet']);
        $otherReceiptEntity->setReceiptId($receiptId);
        $otherReceiptEntity->setSheetAcronym('U');
        $otherReceiptEntity->setStudentId((int)$request['student_id'] ?? null);
        $otherReceiptEntity->setSchoolId($school_id);
        $otherReceiptEntity->setFullName($request['person_name']);
        $otherReceiptEntity->setCreatedBy($createdBy);

        // Create new receipt
        try {
            $response = $this->otherReceiptService->createReceipt(
                $otherReceiptEntity, $otherReceiptEntity->getCreatedBy()
            );
            return response($response);

        } catch (Exception $ex) {

            Log::info($ex->getMessage());   //Send error message to Log
            return response("Error del interno del servidor", 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \Infrastructure\OtherReceipt\Model\OtherReceipt $otherReceipt
     * @return \Illuminate\Http\Response
     * @throws ValueNotFoundException
     */
    public function show(int $id): View
    {
        // Get other-receipt data model with the receipt id
        $otherReceipt = $this->otherReceiptService->findOrFailWithTrashed($id);
        // Get base receipt collection
        $baseReceipt = $this->receiptService->findOrFailWithTrashed($otherReceipt->receipt_id);
        // Receipt payment date formatted
        $payment_date = DateToLatinAmericaFormat::execute($baseReceipt->payment_date); //TODO: convert this to a global execution
        // Get the student data model
        if ($otherReceipt->student_id != null && $otherReceipt->student_id != 0) {
            // Get student data model related to the receipt
            $student = $this->studentService->findById($otherReceipt->student_id);
            // Get student full name by paternal surname
            $student_name = CreateFullName::ByPaternalSurname(
                $student->first_name, $student->paternal_surname, $student->maternal_surname);
            // Get school data model related to the student
            $school = $this->schoolService->findById($student->school_id);
            // Return the view
            return view('modules.accounting.other_receipts.actions.modal-show-other-receipt',
                compact(['baseReceipt', 'otherReceipt', 'student', 'school', 'payment_date', 'student_name']));
        } else {
            $person_name = $otherReceipt->full_name;
            $school = $this->schoolService->findById($otherReceipt->school_id);
            // Return the view
            return view('modules.accounting.other_receipts.actions.modal-show-other-receipt',
                compact(['baseReceipt', 'otherReceipt', 'school', 'payment_date', 'person_name']));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Infrastructure\OtherReceipt\Model\OtherReceipt  $otherReceipt
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherReceipt $otherReceipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Infrastructure\OtherReceipt\Model\OtherReceipt  $otherReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtherReceipt $otherReceipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Infrastructure\OtherReceipt\Model\OtherReceipt  $otherReceipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtherReceipt $otherReceipt)
    {
        //
    }

    public function softDelete($id)
    {
        $otherReceipt = $this->otherReceiptService->findById($id);
        $baseReceipt = $this->receiptService->findById($otherReceipt->receipt_id);

        try {
            $this->receiptService->delete($baseReceipt->id);
            $this->otherReceiptService->delete($id);
        } catch (OperationNotPermittedCeulverException $exception) {
            return new Response($exception->getMessage(), 400);
        } catch (Exception $exception) {
            return new Response('Error interno en el servidor', 500);
        }
    }

}

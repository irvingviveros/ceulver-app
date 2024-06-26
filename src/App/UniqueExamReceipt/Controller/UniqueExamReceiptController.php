<?php

namespace App\UniqueExamReceipt\Controller;

use App\Http\Controllers\Controller;
use Domain\Receipt\Entity\ReceiptEntity;
use Domain\Receipt\Service\ReceiptService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Student\Actions\CreateFullName;
use Domain\StudentReceipt\Actions\DateToLatinAmericaFormat;
use Domain\UniqueExamCandidate\Entity\UniqueExamCandidateEntity;
use Domain\UniqueExamCandidate\Service\UniqueExamCandidateService;
use Domain\UniqueExamReceipt\Entity\UniqueExamReceiptEntity;
use Domain\UniqueExamReceipt\Service\UniqueExamReceiptService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Infrastructure\Receipt\Repository\EloquentReceiptRepository;
use Infrastructure\UniqueExamCandidate\Repository\EloquentUniqueExamCandidateRepository;
use Infrastructure\UniqueExamReceipt\Repository\EloquentUniqueExamReceiptRepository;
use Mockery\CountValidator\Exception;

class UniqueExamReceiptController extends Controller
{
    private ReceiptService $receiptService;
    private UniqueExamReceiptService $examReceiptService;
    private UniqueExamCandidateService $candidateService;

    public function __construct()
    {
        $this->receiptService = new ReceiptService(
            new EloquentReceiptRepository()
        );

        $this->examReceiptService = new UniqueExamReceiptService(
            new EloquentUniqueExamReceiptRepository()
        );

        $this->candidateService = new UniqueExamCandidateService(
            new EloquentUniqueExamCandidateRepository()
        );

    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => route('accounting.dashboard'), 'name' => "Coordinación administrativa"],
            ['name' => "Administración de recibos - Otros"]
        ];

        return view('modules.accounting.unique_exam_receipts.index', compact(['breadcrumbs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        // Retrieve last receipt sheet and add + 1 for a new receipt
        $lastSheet = $this->examReceiptService->lastSheetId() + 1;

        return view('modules.accounting.unique_exam_receipts.actions.modal-add-unique-exam-receipt',
            compact(['lastSheet'])
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // Declare entities
        $receiptEntity = new ReceiptEntity();
        $uniqueExamReceiptEntity = new UniqueExamReceiptEntity();
        $uniqueExamCandidateEntity = new UniqueExamCandidateEntity();

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

        $receiptId = $this->receiptService->createGetId($receiptEntity, $createdBy);

        //Exu candidate
        $uniqueExamCandidateEntity->setFirstName($request['first_name']);
        $uniqueExamCandidateEntity->setPaternalSurname($request['paternal_surname']);
        $uniqueExamCandidateEntity->setMaternalSurname($request['maternal_surname']);
        $uniqueExamCandidateEntity->setRubric($request['rubric']);
        $uniqueExamCandidateEntity->setCreatedBy($createdBy);

        $candidateId = $this->candidateService->createGetId($uniqueExamCandidateEntity);

        // Exu candidate receipt
        $uniqueExamReceiptEntity->setReceiptId($receiptId);
        $uniqueExamReceiptEntity->setCandidateId($candidateId);
        $uniqueExamReceiptEntity->setSheetId($request['sheet']);
        $uniqueExamReceiptEntity->setCreatedBy($createdBy);

        // Create new receipt
        try {
            $response = $this->examReceiptService->createReceipt(
                $uniqueExamReceiptEntity
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
     * @param  int  $id
     * @return View
     */
    public function show(int $id): View
    {
        // Get unique-exam receipt data model with the receipt id
        $uniqueExamReceipt = $this->examReceiptService->findOrFailWithTrashed($id);
        // Get base receipt collection
        $baseReceipt = $this->receiptService->findOrFailWithTrashed($uniqueExamReceipt->receipt_id);
        // Receipt payment date formatted
        $payment_date = DateToLatinAmericaFormat::execute($baseReceipt->payment_date);
        // Get the candidate data model related to the receipt
        $candidate = $this->candidateService->findById($uniqueExamReceipt->unique_exam_candidate_id);
        // Get student full name by paternal surname
        $candidateFullName = CreateFullName::ByPaternalSurname(
            $candidate->first_name, $candidate->paternal_surname, $candidate->maternal_surname);

        return view('modules.accounting.unique_exam_receipts.actions.modal-show-unique-exam-receipt',
            compact(['baseReceipt', 'uniqueExamReceipt', 'candidate', 'candidateFullName', 'payment_date']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function softDelete($id)
    {
        $uniqueExamReceiptCollection = $this->examReceiptService->findById($id);
        $baseReceiptCollection = $this->receiptService->findById($uniqueExamReceiptCollection->receipt_id);

        try {
            $this->receiptService->delete($baseReceiptCollection->id);
            $this->examReceiptService->delete($id);
        } catch (OperationNotPermittedCeulverException $exception) {
            return new Response($exception->getMessage(), 400);
        } catch (Exception $exception) {
            return new Response('Error interno en el servidor', 500);
        }
    }
}

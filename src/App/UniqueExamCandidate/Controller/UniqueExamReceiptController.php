<?php

namespace App\UniqueExamCandidate\Controller;

use App\Http\Controllers\Controller;
use Domain\Receipt\Service\ReceiptService;
use Domain\UniqueExamCandidate\Service\UniqueExamCandidateService;
use Domain\UniqueExamReceipt\Service\UniqueExamReceiptService;
use Illuminate\Contracts\View\View;
use Infrastructure\Receipt\Repository\EloquentReceiptRepository;
use Infrastructure\UniqueExamCandidate\Repository\EloquentUniqueExamCandidateRepository;
use Infrastructure\UniqueExamReceipt\Repository\EloquentUniqueExamReceiptRepository;

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
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}

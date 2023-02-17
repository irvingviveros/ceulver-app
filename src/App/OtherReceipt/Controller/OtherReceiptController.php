<?php

namespace App\OtherReceipt\Controller;

use App\Http\Controllers\Controller;
use Domain\Receipt\Service\ReceiptService;
use Domain\School\Service\SchoolService;
use Domain\Student\Service\StudentService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Infrastructure\OtherReceipt\Model\OtherReceipt;
use Infrastructure\Receipt\Repository\EloquentReceiptRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;
use Infrastructure\Student\Repository\EloquentStudentRepository;


class OtherReceiptController extends Controller
{
    private ReceiptService $receiptService;
    private StudentService $studentService;
    private SchoolService $schoolService;

    public function __construct()
    {
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Infrastructure\OtherReceipt\Model\OtherReceipt  $otherReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(OtherReceipt $otherReceipt)
    {
        //
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
}

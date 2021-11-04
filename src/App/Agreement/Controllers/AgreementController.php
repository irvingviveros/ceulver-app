<?php

namespace App\Agreement\Controllers;

use App\Http\Controllers\Controller;
use Domain\Agreement\Entity\AgreementEntity;
use Domain\Agreement\Service\AgreementService;
use Domain\Shared\exception\CeulverOperationNotPermittedException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Infrastructure\Agreement\Model\Agreement;
use Infrastructure\Agreement\Repository\EloquentAgreementRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;

class AgreementController extends Controller
{
    private Agreement $agreementModel;
    private EloquentAgreementRepository $agreementRepository;
    private AgreementService $agreementService;
    private EloquentSchoolRepository $schoolRepository;

    public function __construct(EloquentSchoolRepository $schoolRepository)
    {
        $this->agreementModel = new Agreement();
        $this->agreementRepository = new EloquentAgreementRepository($this->agreementModel);
        $this->agreementService = new AgreementService($this->agreementRepository);
        $this->schoolRepository = $schoolRepository;
    }

    public function index()
    {
        // Get only the id and name from school table
        $schools = $this->schoolRepository->all(['id', 'school_name']);

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Alumnos"],
            ['name' => "Convenio de alumnos"]
        ];
        return view(
            'modules.student.agreement.index',
            ['breadcrumbs' => $breadcrumbs], compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Declare new Agreement object
        $agreement = new AgreementEntity();

        // Request and set agreement data
        $agreement->setAgreement(
            $request->input('agreement')
        );

        $agreement->setNote(
            $request->input('note')
        );

        $agreement->setStatus(
            $request->input('status')
        );

        // Request current user data
        $user = auth()->user();
        $createdBy = $user->id;
        $modifiedBy = $user->id;

        // Try to create new school
        try {
            $id = $this->agreementService->create(
                $agreement, $createdBy, $modifiedBy
            );

            return response($id, 200);
        } catch(CeulverOperationNotPermittedException $cop) {
            return response($cop->getMessage(), 400);
        } catch(Exception $ex) {
            //TODO mandar al log el mensaje de error
            return response("Error del interno del servidor", 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        // Find agreement
        $agreement = $this->agreementRepository->findById($id);
        //return view('', compact('agreement'))
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        // Find agreement
        $agreement = $this->agreementRepository->findById($id);

        $agreement->agreement = $request->input('agreement');
        $agreement->note = $request->input('note');
        $agreement->status = $request->input('status');
        //$agreement->school_id = $request->input('school_id');

        try{
            $agreement->save();
        } catch (Exception $ex) {

        }

        return redirect('')->with('status', 'El convenio se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $agreement = $this->agreementRepository->findById($id);
        $agreement->delete();
        return Response(200);
    }
}

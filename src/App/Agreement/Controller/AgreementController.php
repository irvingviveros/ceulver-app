<?php
declare(strict_types = 1);

namespace App\Agreement\Controller;

use App\Http\Controllers\Controller;
use Domain\Agreement\Entity\AgreementEntity;
use Domain\Agreement\Service\AgreementService;
use Domain\School\Service\SchoolService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Infrastructure\Agreement\Repository\EloquentAgreementRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;

class AgreementController extends Controller
{
    private AgreementService $agreementService;

    /**
     *
     */
    public function __construct()
    {
        $this->agreementService = new AgreementService(
            new EloquentAgreementRepository()
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Initialize variables

        $agreements = $this->agreementService->with('schools');

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Alumnos"],
            ['name' => "Convenio de alumnos"]
        ];

        return view(
            'modules.student.agreement.index',
            ['breadcrumbs' => $breadcrumbs], compact('agreements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $schoolRepository = new EloquentSchoolRepository();
        $schools = $schoolRepository->all();

        return view('modules.student.agreement.actions.modal-add-agreement', compact('schools'));
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

        // Request current user data
        $user = auth()->user();
        $createdBy  = $user->id;
        $modifiedBy = $user->id;


        // Request and set agreement data
        $agreement->setName($request->input('name'));
        $agreement->setNote($request->input('note'));
        $agreement->setStatus(1);

        // Create new agreement
        try {
            $id = $this->agreementService->create(
                $agreement, $createdBy, $modifiedBy
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
     */
    public function edit(int $id): View
    {
        $agreement = null;
        $agreementSchools = null;
        $schools = null;

        if ($id > 0) {
            $schoolService = new SchoolService(
                new EloquentSchoolRepository()
            );
            try {
                $agreement = $this->agreementService->findById($id);
                // Get schools attached to this agreement
                $agreementSchools = $agreement->schools;
                // Get all schools
                $allSchools = $schoolService->getAll();
                // Return the values in the original collection that are not present in the given collection
                $schools = $allSchools->diff($agreementSchools);

            } catch (Exception $exception) {
                Log::info($exception->getMessage());
            }
        }

        return view(
            'modules.student.agreement.actions.modal-edit-agreement', compact(['agreement', 'agreementSchools', 'schools'])
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request)
    {
        // Initialize variables
        $agreementEntity = new AgreementEntity();

        // Request current user data
        $user = auth()->user();
        $modifiedBy = $user->id;

        // Request Agreement data
        $id = $request->input('id');
        $agreementEntity->setName($request->input('name'));
        $agreementEntity->setNote($request->input('note'));
        $agreementEntity->setStatus(1); // Default, 1 (active)

        $this->agreementService->update(
            $id, $agreementEntity, $modifiedBy
        );

        $agreement = $this->agreementService->findById($id);
        $agreement->schools()->sync($request->input('schools',[]));

        return response("");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        try {
            $this->agreementService->detach($id);
            $this->agreementService->delete($id);
        } catch (OperationNotPermittedCeulverException $exception) {
            return new Response($exception -> getMessage(), 400);
        } catch (Exception $exception) {
            return new Response('Error interno en el servidor', 500);
        }
    }

    /**
     * Get information of agreements
     */
    public function getList() {

        //Initialize variables
        $agreements = $this->agreementService->with('schools');

        return view(
            'modules.student.agreement.list.list', compact('agreements')
        );
    }
}

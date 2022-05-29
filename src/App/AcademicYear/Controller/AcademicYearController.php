<?php
declare(strict_types = 1);

namespace App\AcademicYear\Controller;

use App\AcademicYear;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Domain\AcademicYear\Entity\AcademicYearEntity;
use Domain\AcademicYear\Service\AcademicYearService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Infrastructure\AcademicYear\Repository\EloquentAcademicYearRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;

class AcademicYearController extends Controller
{
    private AcademicYearService $academicYearService;

    public function __construct()
    {
        $this->academicYearService = new AcademicYearService(
            new EloquentAcademicYearRepository()
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
        $academicYears = $this->academicYearService->getAll();

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Generaciones"],
            ['name' => "Administrar generaciones"]
        ];

        return view(
            'modules.academics.academicYear.index',
            ['breadcrumbs' => $breadcrumbs], compact('academicYears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $schoolRepository = new EloquentSchoolRepository();
        $schools = $schoolRepository->all();

        return view('modules.academics.academicYear.actions.modal-add-academic-year', compact('schools'));
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
        $academicYearEntity = new AcademicYearEntity();

        // Request current user data
        $user = auth()->user();
        $createdBy  = $user->id;
        $modifiedBy = $user->id;

        // Request and set data
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));

        // Calculate session code
        $code = $this->academicYearService->calculateSessionCode($startDate, $endDate);

        // Calculate if the session is running
        $isCurrentSession = $this->academicYearService->calculateCurrentSession($startDate, $endDate);

        $academicYearEntity->setSchoolId((int)$request->input('school_id'));
        $academicYearEntity->setSessionCode($code);
        $academicYearEntity->setStartDate($startDate);
        $academicYearEntity->setEndDate($endDate);
        $academicYearEntity->setNote($request->input('note')); //TODO: que acepte null
        $academicYearEntity->setIsRunning($isCurrentSession);
        $academicYearEntity->setStatus(1);

        // Create new academic year
        try {
            $id = $this->academicYearService->create(
                $academicYearEntity, $createdBy, $modifiedBy
            );
            return response($id, 200);

        } catch(OperationNotPermittedCeulverException $cop) {
            return response($cop->getMessage(), 400);
        } catch(Exception $ex) {

            Log::info($ex->getMessage());   //Send error message to Log

            return response("Error del interno del servidor", 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->academicYearService->delete($id);
        } catch (OperationNotPermittedCeulverException $exception) {
            return new Response($exception -> getMessage(), 400);
        } catch (Exception $exception) {
            return new Response('Error interno en el servidor', 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(int $id): View
    {
        $academicYear = null;

        if ($id > 0) {
            try {
                $academicYear = $this->academicYearService->findById($id);
            } catch (Exception $exception) {
                Log::info($exception->getMessage());
            }
        }

        return view(
            'modules.academics.academicYear.actions.modal-edit-academicYear', compact(['academicYear'])
        );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return Response
     */
    public function update(Request $request)
    {
        // Initialize variables
        $academicYearEntity = new AcademicYearEntity();

        // Request current user data
        $user = auth()->user();
        $modifiedBy = $user->id;

        // Request and set data
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));

        // Calculate session code
        $code = $this->academicYearService->calculateSessionCode($startDate, $endDate);

        // Calculate if the session is running
        $isCurrentSession = $this->academicYearService->calculateCurrentSession($startDate, $endDate);

        $id = $request->input('id');
        $academicYearEntity->setStartDate($startDate);
        $academicYearEntity->setEndDate($endDate);
        $academicYearEntity->setSessionCode($code);
        $academicYearEntity->setIsRunning($isCurrentSession);
        $academicYearEntity->setNote($request->input('note'));
        $academicYearEntity->setStatus(1); // Default, 1 (active)

        $this->academicYearService->update(
            $id, $academicYearEntity, $modifiedBy
        );

        return response("");
    }


    /**
     * Get information of subjects
     */
    public function getList() {

        //Initialize variables
        $academicYears = $this->academicYearService->getAll();

        return view(
            'modules.academics.academicYear.list.list', compact('academicYears')
        );
    }
}

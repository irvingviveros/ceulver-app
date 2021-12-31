<?php
declare(strict_types = 1);

namespace App\Subject\Controller;

use App\Http\Controllers\Controller;
use App\Subject;
use Carbon\Carbon;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Subject\Entity\SubjectEntity;
use Domain\Subject\Service\SubjectService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Infrastructure\School\Repository\EloquentSchoolRepository;
use Infrastructure\Subject\Repository\EloquentSubjectRepository;

class SubjectController extends Controller
{
    private SubjectService $subjectService;

    public function __construct()
    {
        $this->subjectService = new SubjectService(
            new EloquentSubjectRepository()
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
        $subjects = $this->subjectService->getAll();

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Materias"],
            ['name' => "Administrar materias"]
        ];

        return view(
          'modules.academics.subject.index',
            ['breadcrumbs' => $breadcrumbs], compact('subjects'));
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

        return view('modules.academics.subject.actions.modal-add-subject', compact('schools'));
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
        $subjectEntity = new SubjectEntity();

        // Request current user data
        $user = auth()->user();
        $createdBy  = $user->id;
        $modifiedBy = $user->id;

        // Request and set agreement data
        $subjectEntity->setSchoolId((int)$request->input('school_id'));
        $subjectEntity->setName($request->input('name'));
        $subjectEntity->setCode($request->input('code'));
        $subjectEntity->setOpeningDate(Carbon::parse($request->input('opening_date')));
        $subjectEntity->setDescription($request->input('description'));
        $subjectEntity->setStatus(1);

        // Create new agreement
        try {
            $id = $this->subjectService->create(
                $subjectEntity, $createdBy, $modifiedBy
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
     */
    public function edit(int $id): View
    {
        $subject = null;

        if ($id > 0) {
            try {
                $subject = $this->subjectService->findById($id);
            } catch (Exception $exception) {
                Log::info($exception->getMessage());
            }
        }

        return view(
            'modules.academics.subject.actions.modal-edit-subject', compact(['subject'])
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
        $subjectEntity = new SubjectEntity();

        // Request current user data
        $user = auth()->user();
        $modifiedBy = $user->id;

        // Request Agreement data
        $id = $request->input('id');
        $subjectEntity->setName($request->input('name'));
        $subjectEntity->setCode($request->input('code'));
        $subjectEntity->setOpeningDate(Carbon::parse($request->input('opening_date')));
        $subjectEntity->setDescription($request->input('description'));
        $subjectEntity->setStatus(1); // Default, 1 (active)

        $this->subjectService->update(
            $id, $subjectEntity, $modifiedBy
        );

        return response("");
    }

    public function destroy(int $id)
    {
        try {
            $this->subjectService->delete($id);
        } catch (OperationNotPermittedCeulverException $exception) {
            return new Response($exception -> getMessage(), 400);
        } catch (Exception $exception) {
            return new Response('Error interno en el servidor', 500);
        }
    }

    /**
     * Get information of subjects
     */
    public function getList() {

        //Initialize variables
        $subjects = $this->subjectService->getAll();

        return view(
            'modules.academics.subject.list.list', compact('subjects')
        );
    }
}

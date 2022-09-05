<?php
declare(strict_types=1);

namespace App\Syllabus\Controller;

use App\Http\Controllers\Controller;
use App\Syllabus;
use Domain\Career\Service\CareerService;
use Domain\School\Service\SchoolService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Syllabus\Entity\SyllabusEntity;
use Domain\Syllabus\Service\SyllabusService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Infrastructure\Career\Repository\EloquentCareerRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;
use Infrastructure\Syllabus\Repository\EloquentSyllabusRepository;

class SyllabusController extends Controller
{
    private SyllabusService $syllabusService;
    private SchoolService $schoolService;
    private CareerService $careerService;

    /**
     *
     */
    public function __construct()
    {
        $this->syllabusService = new SyllabusService(
            new EloquentSyllabusRepository()
        );

        $this->schoolService = new SchoolService(
            new EloquentSchoolRepository()
        );

        $this->careerService = new CareerService(
            new EloquentCareerRepository()
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        //Initialize variables
        $syllabi = $this->syllabusService->with('school.educationalSystem');
        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Retículas"],
            ['name' => "Administrar retículas"]
        ];

        return view(
            'modules.academics.syllabi.index',
            ['breadcrumbs' => $breadcrumbs], compact('syllabi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = $this->schoolService->getAll();
        $careers = $this->careerService->orderBy('name');

        return view('modules.academics.syllabi.actions.modal-add-syllabus', compact(['schools', 'careers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Initialize variables
        $syllabus = new SyllabusEntity();

        // Request current user data
        $user = auth()->user();
        $createdBy  = $user->id;
        $modifiedBy = $user->id;

        // Request syllabus data
        $syllabus->setSchoolId((int)$request->input('school_id'));
        $syllabus->setCareerId((int)$request->input('career_id'));
        $syllabus->setName($request->input('name'));
        $syllabus->setNote($request->input('note'));

        try {
            $id = $this->syllabusService->create(
                $syllabus, $createdBy, $modifiedBy
            );
            return response($id, 200);

        } catch (OperationNotPermittedCeulverException $opx) {
            return response($opx->getMessage(), 400);
        } catch (Exception $ex) {

            Log::info($ex->getMessage());   //Send error message to Log

            return response("Error interno del servidor", 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $syllabus = null;

        if ($id > 0) {
            try {
                $syllabus = $this->syllabusService->findById($id);
            } catch (Exception $exception) {
                Log::info($exception->getMessage());
            }
        }

        return view(
            'modules.academics.syllabi.actions.modal-edit-syllabus', compact('syllabus')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request)
    {
        // Initialize variables
        $syllabusEntity = new SyllabusEntity();

        // Request current user data
        $user = auth()->user();
        $modifiedBy = $user->id;

        // Request syllabus data
        $id = $request->input('id');
        $syllabusEntity->setName($request->input('name'));
        $syllabusEntity->setNote($request->input('note'));

        $this->syllabusService->update(
            $id, $syllabusEntity, $modifiedBy
        );

        return response("");
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            $this->syllabusService->delete($id);
        } catch (OperationNotPermittedCeulverException $exception) {
            return new Response($exception->getMessage(), 400);
        } catch (Exception $exception) {
            // TODO CAMBIAR POR VISTA DE ERROR INTERNO
            // TODO enviar mensaje de error al log
            return new Response('Error interno en el servidor', 500);
        }
    }

    /**
     * Get information of agreements
     */
    public function getList() {

        $syllabi = $this->syllabusService->with('school.educationalSystem');

        return view(
            'modules.academics.syllabi.list.list', compact('syllabi')
        );
    }
}

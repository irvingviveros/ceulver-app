<?php
declare(strict_types=1);

namespace App\Cycle\Controller;

use App\Http\Controllers\Controller;
use App\Cycle;
use Domain\Cycle\Entity\CycleEntity;
use Domain\Cycle\Service\CycleService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Syllabus\Service\SyllabusService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Infrastructure\Syllabus\Repository\EloquentSyllabusRepository;
use Infrastructure\Cycle\Repository\EloquentCycleRepository;

class CycleController extends Controller
{
    private CycleService $cycleService;
    private SyllabusService $syllabusService;

    public function __construct()
    {
        $this->cycleService = new CycleService(
            new EloquentCycleRepository()
        );

        $this->syllabusService = new SyllabusService(
            new EloquentSyllabusRepository()
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index($syllabus_id)
    {
        // Get all cycles from syllabus
        $cycles = $this->cycleService->where('syllabus_id', $syllabus_id);

        // Get parent attributes (syllabus)
        $syllabus = $this->syllabusService->where('id', $syllabus_id);  // Returns an array
        $syllabus = $syllabus[0]; // Access array element

        $breadcrumbs = [
            ['link' => "/", 'name' => "Inicio"],
            ['link' => route("manage-syllabi.index"), 'name' => "Retículas"],
            ['link' => "javascript:void(0)", 'name' => $syllabus->name],
            ['name' => "Administrar ciclos"]
        ];

        return view(
            'modules.academics.syllabi.cycles.index',
            ['breadcrumbs' => $breadcrumbs], compact('cycles', 'syllabus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($syllabus_id)
    {
        return view('modules.academics.syllabi.cycles.actions.modal-add-cycle', compact('syllabus_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Initialize variables
        $cycle = new CycleEntity();

        // Request current user data
        $user = auth()->user();
        $createdBy  = $user->id;
        $modifiedBy = $user->id;

        // Request syllabus data
        $cycle->setName($request->input('name'));
        $cycle->setNote($request->input('note'));
        $cycle->setSyllabusId((int)$request->input('syllabus_id'));

        try {
            $id = $this->cycleService->create(
                $cycle, $createdBy, $modifiedBy
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
     */
    public function edit($id)
    {
        $cycle = null;

        if ($id > 0) {
            try {
                $cycle = $this->cycleService->findById($id);
            } catch (Exception $exception) {
                Log::info($exception->getMessage());
            }
        }
        return view(
            'modules.academics.syllabi.cycles.actions.modal-edit-cycle', compact('cycle')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Initialize variables
        $cycleEntity = new CycleEntity();

        // Request current user data
        $user = auth()->user();
        $modifiedBy = $user->id;

        // Request syllabus data
        $id = $request->input('id');
        $cycleEntity->setName($request->input('name'));
        $cycleEntity->setNote($request->input('note'));

        $this->cycleService->update(
            $id, $cycleEntity, $modifiedBy
        );

        return response("");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->cycleService->delete($id);
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
    public function getList($parent_id): View
    {
        // Get all cycles from syllabus
        $cycles = $this->cycleService->where('syllabus_id', $parent_id);

        // Get parent attributes (syllabus)
        $syllabus = $this->syllabusService->where('id', $parent_id);  // Returns an array
        $syllabus = $syllabus[0]; // Access array element

        return view('modules.academics.syllabi.cycles.list.list', compact('cycles', 'syllabus'));
    }
}

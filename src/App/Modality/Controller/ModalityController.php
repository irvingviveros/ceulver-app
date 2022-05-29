<?php
declare(strict_types = 1);

namespace App\Modality\Controller;

use App\Http\Controllers\Controller;
use App\Modality;
use Domain\Modality\Entity\ModalityEntity;
use Domain\Modality\Service\ModalityService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Infrastructure\Modality\Repository\EloquentModalityRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;

class ModalityController extends Controller
{
    private ModalityService $modalityService;

    public function __construct()
    {
        $this->modalityService = new ModalityService(
            new EloquentModalityRepository()
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        // Initialize variables
        $modalities = $this->modalityService->getAll();

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Modalidades"],
            ['name' => "Administrar modalidades"]
        ];

        return view(
            'modules.academics.modality.index',
            ['breadcrumbs' => $breadcrumbs], compact('modalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $schoolRepository = new EloquentSchoolRepository();
        $schools = $schoolRepository->all();

        return view('modules.academics.modality.actions.modal-add-modality', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Declare new object
        $modalityEntity = new ModalityEntity();

        // Request current user data
        $user = auth()->user();
        $createdBy  = $user->id;
        $modifiedBy = $user->id;

        // Request and set data
        $modalityEntity->setSchoolId((int)$request->input('school_id'));
        $modalityEntity->setName($request->input('name'));
        $modalityEntity->setNote($request->input('note'));

        try {
            $id = $this->modalityService->create(
                $modalityEntity, $createdBy, $modifiedBy
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
        $modality = null;

        if ($id > 0) {
            try {
                $modality = $this->modalityService->findById($id);
            } catch (Exception $exception) {
                Log::info($exception->getMessage());
            }
        }

        return view(
            'modules.academics.modality.actions.modal-edit-modality', compact(['modality'])
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Initialize variables
        $modalityEntity = new ModalityEntity();

        // Request current user data
        $user = auth()->user();
        $modifiedBy = $user->id;

        // Request data
        $id = $request->input('id');
        $modalityEntity->setName($request->input('name'));
        $modalityEntity->setNote($request->input('note'));

        $this->modalityService->update(
            $id, $modalityEntity, $modifiedBy
        );

        return response("");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $this->modalityService->delete($id);
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
        $modalities = $this->modalityService->getAll();

        return view(
            'modules.academics.modality.list.list', compact('modalities')
        );
    }
}

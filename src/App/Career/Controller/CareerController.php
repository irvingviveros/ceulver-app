<?php
declare(strict_types = 1);

namespace App\Career\Controller;

use App\Http\Controllers\Controller;
use Domain\Career\Entity\CareerEntity;
use Domain\Career\Service\CareerService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Infrastructure\Career\Repository\EloquentCareerRepository;

class CareerController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Initialize variables
        $careerService = new CareerService(
            new EloquentCareerRepository()
        );
        $careers = $careerService->getAll();

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"]
            , ['link' => "javascript:void(0)", 'name' => "Carreras"]
            , ['name' => "Administrar carreras"]
        ];

        return view(
            'modules.career.index'
            , ['breadcrumbs' => $breadcrumbs]
            , compact('careers')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.career.actions.modal-create-career');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Initialize variables
        $career = new CareerEntity();
        $careerService = new CareerService(
            new EloquentCareerRepository()
        );

        // Request current user data
        $user = auth()->user();
        $createdBy  = $user->id;
        $modifiedBy = $user->id;

        // Request career data
        $career->setCareerName($request->input('name'));
        $career->setEnrollment($request->input('enrollment'));
        $career->setOpeningDate($request->input('opening_date'));

        try {
            $id = $careerService->create(
                $career, $createdBy, $modifiedBy
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
     * @throws OperationNotPermittedCeulverException
     */
    public function update(Request $request)
    {
        // Initialize variables
        $careerEntity = new CareerEntity();
        $careerService = new CareerService(
            new EloquentCareerRepository()
        );

        // Request current user data
        $user = auth()->user();
        $modifiedBy = $user->id;

        // Request career data
        $id = $request->input('id');
        $careerEntity->setCareerName($request->input('name'));
        $careerEntity->setEnrollment($request->input('enrollment'));
        $careerEntity->setOpeningDate($request->input('opening_date'));

        $careerService->update(
            $id, $careerEntity, $modifiedBy
        );

        return response("");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $career = null;

        if ($id > 0) {
            $careerService = new CareerService(
                new EloquentCareerRepository()
            );
            try {
                $career = $careerService->findById($id);
            } catch (Exception $exception) {
                Log::info($exception->getMessage());
            }
        }

        return view(
            'modules.career.actions.modal-edit-career', compact('career')
        );
    }

    /**
     * Remove the specified resource from storage
     */
    public function destroy($id) {
        $careerService = new CareerService(
            new EloquentCareerRepository()
        );

        try {
            $careerService->delete($id);

        } catch (OperationNotPermittedCeulverException $exception) {
            return new Response($exception->getMessage(), 400);
        } catch (Exception $exception) {
            // TODO CAMBIAR POR VISTA DE ERROR INTERNO
            // TODO enviar mensaje de error al log
            return new Response('Error interno en el servidor', 500);
        }
    }

    /**
     * Get information of careers
     */
    public function getList() {

        //Initialize variables
        $careerService = new CareerService(
            new EloquentCareerRepository()
        );
        $careers = $careerService->getAll();

        return view(
            'modules.career.list.list', compact('careers')
        );
    }
}
<?php
declare(strict_types = 1);

namespace App\Career\Controller;

use App\Http\Controllers\Controller;
use Domain\Career\Service\CareerService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Infrastructure\Career\Repository\EloquentCareerRepository;


class CareerController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"]
            , ['link' => "javascript:void(0)", 'name' => "Carreras"]
            , ['name' => "Administrar carreras"]
        ];

        return view(
            'modules.career.list.index', ['breadcrumbs' => $breadcrumbs]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // Request current user data
        $user = auth()->user();
        $createdBy  = $user->id;
        $modifiedBy = $user->id;

        // Request career data
        $career_name  = $request->input('name');
        $enrollment   = $request->input('enrollment');
        $opening_date = $request->input('opening_date');

        $carrerService = new CareerService(
            new EloquentCareerRepository()
        );

        try {
            $id = $carrerService->create(
                $career_name, $enrollment, $opening_date, $createdBy, $modifiedBy
            );

            return response($id, 200);
        } catch (ValueNotFoundException $vnfe) {
            // TODO cambiar el codigo de error
            return response(0, 200);
        } catch (OperationNotPermittedCeulverException $opx) {
            // TODO cambiar el codigo de error
            return response($opx->getMessage(), 200);
        } catch (Exception $ex) {
            // TODO enviar mensaje al log
            return response("Error interno del servidor", 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $careerService = new CareerService(
            new EloquentCareerRepository()
        );

        try {
            $career = $careerService->findById($id);

            return view(
                'modules.career.list.edit', compact('career')
            );
        } catch (ValueNotFoundException $vnfe) {
            throw new ModelNotFoundException();
        } catch (Exception $exception) {
            // TODO CAMBIAR POR VISTA DE ERROR INTERNO
            // TODO enviar mensaje de error al log
            throw new ModelNotFoundException();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

            return redirect('admin/manage-careers')
                ->with('status', 'La carrera se ha eliminado correctamente')
                ;
        } catch (ValueNotFoundException $vnfe) {
            throw new ModelNotFoundException();
        } catch (Exception $exception) {
            // TODO CAMBIAR POR VISTA DE ERROR INTERNO
            // TODO enviar mensaje de error al log
            throw new ModelNotFoundException();
        }
    }
}
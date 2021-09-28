<?php

namespace App\src\App\School\Controllers;

use App\Http\Controllers\Controller;
use App\src\domain\School\SchoolService;
use App\src\domain\shared\exception\CeulverOperationNotPermittedException;
use App\src\Infraestructure\School\EloquentSchoolRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SchoolController extends Controller {

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response {
        // TODO me parce que se puede hacer esto con una librería, el mapear la request a un objeto
        // Request school data
        $schoolName = $request->input('school_name');
        $schoolAddress = $request->input('school_address');
        $schoolEmail = $request->input('school_email');
        $schoolAdmission = $request->input('school_admission');

        // Request current user data
        $user = auth()->user();
        $createdBy = $user->id;
        $modifiedBy = $user->id;

        $schoolRepository = new EloquentSchoolRepository();

        $schoolService = new SchoolService(
            $schoolRepository
        );

        try {
            $id = $schoolService->create(
                $schoolName, $schoolAddress, $schoolEmail, $schoolAdmission, $createdBy, $modifiedBy
            );

            return response($id, 200);
        } catch(CeulverOperationNotPermittedException $cop) {
            return response($cop->getMessage(), 400);
        } catch(Exception $ex) {
            //TODO mandar al log el mensaje de error
            return response("Error del interno del servidor", 500);
        }
    }
}

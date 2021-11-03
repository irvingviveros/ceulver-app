<?php

namespace App\School\Controllers;

use App\Http\Controllers\Controller;
use Domain\School\Entity\SchoolEntity;
use Domain\School\Service\SchoolService;
use Domain\shared\exception\CeulverOperationNotPermittedException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Infrastructure\School\Model\School;
use Infrastructure\School\Repository\EloquentSchoolRepository;

class SchoolController extends Controller {

    private School $schoolModel;
    private EloquentSchoolRepository $schoolRepository;
    private SchoolService $schoolService;

    public function __construct()
    {
        // TODO: Dependency Injection
        $this->schoolModel = new School();
        $this->schoolRepository = new EloquentSchoolRepository($this->schoolModel);
        $this->schoolService = new SchoolService($this->schoolRepository);
    }

    public function index()
    {
        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Administrador"],
            ['name' => "Administrar escuelas"]
        ];
        return view(
            'modules.admin.school.index',
            ['breadcrumbs' => $breadcrumbs]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find school
        $school = $this->schoolRepository->findById($id);
        return view('modules.admin.school.edit', compact('school'));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response {

        // Declare new school object
        $school = new SchoolEntity();

        // Request and set school data
        $school->setSchoolName(
            $request->input('school_name')
        );

        $school->setSchoolAddress(
            $request->input('school_address')
        );

        $school->setSchoolEmail(
            $request->input('school_email')
        );

        $school->setSchoolAdmission(
            $request->input('school_admission')
        );

        // Request current user data
        $user = auth()->user();
        $createdBy = $user->id;
        $modifiedBy = $user->id;

        // Try to create new school
        try {
            $id = $this->schoolService->create(
                $school, $createdBy, $modifiedBy
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
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $school = $this->schoolRepository->findById($id);
        $this->schoolService->saveLogo($request);
        //aqui me quedé 29 10 21 - 01:15am

        $school->school_name = $request->input('school-name');
        $school->school_code = $request->input('school-code');
        $school->address = $request->input('school-address');
        $school->phone = $request->input('school-phone');
        $school->created_at = $request->input('school-registration');
        $school->email = $request->input('school-email');
        $school->footer = $request->input('school-footer');
        $school->enable_frontend = $request->input('school-frontend');
        $school->enable_online_admission = $request->input('school-admissions');
        $school->school_lat = $request->input('school-latitude');
        $school->school_lng = $request->input('school-longitude');
        $school->map_api_key = $request->input('school-maps-api');
        $school->zoom_api_key = $request->input('school-zoom-api');
        $school->zoom_secret = $request->input('school-zoom-secret');
        $school->facebook_url = $request->input('school-facebook');
        $school->status = $request->input('school-status');

        try {
            $school->save();
        } catch (Exception $ex) {
            dd($ex);
            // TODO: Arreglar las excepciones
//            Toastr::error('Ha habido un error al intentar actualizar el registro', 'No se ha actualizado', [
//                "closeButton" => "true",
//                "tapToDismiss" => "false",
//                "progressBar" => "true"
//            ]);
        }

        return redirect('admin/manage-schools')->with('status', 'La escuela se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $school = $this->schoolRepository->findById($id);
        $school -> delete();
        return \response(200);
    }
}

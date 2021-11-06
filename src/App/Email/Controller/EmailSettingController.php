<?php

namespace App\Email\Controller;

use App\Http\Controllers\Controller;
use Domain\EmailSetting\Service\EmailSettingService;
use Domain\School\Service\SchoolService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Infrastructure\Email\Repository\EloquentEmailSettingRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;


class EmailSettingController extends Controller {

    public function index() {

        $schoolService = new SchoolService(new EloquentSchoolRepository());

        // lo necesita el formulario de creacion
        $schools = $schoolService->getAll();

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"]
            , ['link' => "javascript:void(0)", 'name' => "Administrador"]
            , ['name' => "Configuración de correos"]
        ];

        return view(
            'modules.admin.email_settings.index'
            , [
                'breadcrumbs' => $breadcrumbs
            ]
            , compact('schools')
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

        // Request school data
        $email_protocol     = $request->input('mail_protocol');
        $smtp_host          = $request->input('smtp_host');
        $smtp_port          = $request->input('smtp_port');
        $smtp_timeout       = $request->input('smtp_timeout');
        $smtp_user          = $request->input('smtp_user');
        $smtp_password      = $request->input('smtp_pass');
        $smtp_security      = $request->input('smtp_crypto');
        $email_type         = $request->input('mail_type');
        $email_charset      = $request->input('char_set');
        $email_priority     = $request->input('priority');
        $email_person_name  = $request->input('from_name');
        $email_address      = $request->input('from_address');
        $school_id          = $request->input('school_id');

        $data = array(
            'mail_protocol' => $email_protocol,
            "smtp_host"     => $smtp_host,
            "smtp_port"     => $smtp_port,
            "smtp_timeout"  => $smtp_timeout,
            "smtp_user"     => $smtp_user,
            "smtp_pass"     => $smtp_password,
            "smtp_crypto"   => $smtp_security,
            "mail_type"     => $email_type,
            "char_set"      => $email_charset,
            "priority"      => $email_priority,
            "from_name"     => $email_person_name,
            "from_address"  => $email_address,
            "school_id"     => $school_id,
            "created_by"    => $createdBy,
            "modified_by"   => $modifiedBy
        );

        $emailSettingService = new EmailSettingService(
            new EloquentEmailSettingRepository()
        );

        try {
            $id = $emailSettingService->create($data);

            return response($id, 200);
        } catch(OperationNotPermittedCeulverException $opx) {
            // TODO cambiar el codigo de error a 400
            return response(0, 200);
        } catch(Exception $exception) {
            // TODO enviar mensaje al log
            return response("Error interno del servidor", 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $emailSettingService = new EmailSettingService(
            new EloquentEmailSettingRepository()
        );

        try {
            $emailSetting = $emailSettingService->findById($id);

            return view(
                'modules.admin.email_settings.edit'
                , compact('emailSetting')
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
     */
    public function update(Request $request, $id) {
        $data = array(
            "id"                => $id
            //$emailSettings->mail_protocol = $request->input('smtp-protocol'); // There is not another protocol.
        , "smtp-host"       => $request->input('smtp-host')
        , "smtp-port"       => $request->input('smtp-port')
        , "smtp-timeout"    => $request->input('smtp-timeout')
        , "smtp-user"       => $request->input('smtp-user')
        , "smtp-password"   => $request->input('smtp-password')
        , "smtp-security"   => $request->input('smtp-security')
        , "smtp-type"       => $request->input('smtp-type')
        , "smtp-charset"    => $request->input('smtp-charset')
        , "smtp-priority"   => $request->input('smtp-priority')
        , "email-from-name" => $request->input('email-from-name')
        , "email-address"   => $request->input('email-address')
        , "email-status"    => $request->input('email-status')
        );

        $emailSettingService = new EmailSettingService(
            new EloquentEmailSettingRepository()
        );

        try {
            $emailSettingService->update($data);

            return redirect('admin/email-settings')->with(
                'status', 'La configuración se ha actualizado correctamente'
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
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $emailSettingService = new EmailSettingService(
            new EloquentEmailSettingRepository()
        );

        try {
            $emailSettingService->delete($id);

            return redirect('admin/email-settings')->with(
                'status', 'La configuración se ha eliminado correctamente'
            );
        } catch (ValueNotFoundException $vnfe) {
            throw new ModelNotFoundException();
        } catch (Exception $exception) {
            // TODO CAMBIAR POR VISTA DE ERROR INTERNO
            // TODO enviar mensaje de error al log
            throw new ModelNotFoundException();
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\EmailSetting;
use App\Models\School;
use Illuminate\Http\Request;

class EmailSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "javascript:void(0)", 'name' => "Administrador"], ['name' => "Configuración de correos"]
        ];

        return view('modules.admin.email_settings.index', ['breadcrumbs' => $breadcrumbs], compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Request school data
        $email_protocol = $request->input('mail_protocol');
        $smtp_host = $request->input('smtp_host');
        $smtp_port = $request->input('smtp_port');
        $smtp_timeout = $request->input('smtp_timeout');
        $smtp_user = $request->input('smtp_user');
        $smtp_password = $request->input('smtp_pass');
        $smtp_security = $request->input('smtp_crypto');
        $email_type = $request->input('mail_type');
        $email_charset = $request->input('char_set');
        $email_priority = $request->input('priority');
        $email_person_name = $request->input('from_name');
        $email_address = $request->input('from_address');
        $school_id = $request->input('school_id');

        // Request current user data
        $user = auth()->user();
        $createdBy = $user->id;
        $modifiedBy = $user->id;

        $data = array(
            'mail_protocol'=>$email_protocol,
            "smtp_host"=>$smtp_host,
            "smtp_port"=>$smtp_port,
            "smtp_timeout"=>$smtp_timeout,
            "smtp_user"=>$smtp_user,
            "smtp_pass"=>$smtp_password,
            "smtp_crypto"=>$smtp_security,
            "mail_type"=>$email_type,
            "char_set"=>$email_charset,
            "priority"=>$email_priority,
            "from_name"=>$email_person_name,
            "from_address"=>$email_address,
            "school_id"=>$school_id,
            "created_by"=>$createdBy,
            "modified_by"=>$modifiedBy
        );

        // Call insertData() method of School Model
        $value = EmailSetting::insertData($data);
        if($value){
            echo $value;
        }else{
            echo 0;
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

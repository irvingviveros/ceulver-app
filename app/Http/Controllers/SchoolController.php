<?php

namespace App\Http\Controllers;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => "administrator/manage-schools", 'name' => "Inicio"], ['link' => "javascript:void(0)", 'name' => "Administrador"], ['name' => "Administrar escuelas"]
        ];
        return view('modules.admin.school', ['breadcrumbs' => $breadcrumbs]);
    }

    public function store(Request $request)
    {
        // Request school data
        $schoolName = $request->input('school_name');
        $schoolAddress = $request->input('school_address');
        $schoolEmail = $request->input('school_email');
        $schoolAdmission = $request->input('school_admission');

        // Request current user data
        $user = auth()->user();
        $createdBy = $user->id;
        $modifiedBy = $user->id;

        // Save date into $data var
        if($schoolName !='' && $schoolAddress !='' && $schoolEmail != '' && $schoolAdmission != ''){
            $data = array('school_name'=>$schoolName,"address"=>$schoolAddress,"email"=>$schoolEmail, "enable_online_admission"=>$schoolAdmission, "created_by"=>$createdBy, "modified_by"=>$modifiedBy);

            // Call insertData() method of School Model
            $value = School::insertData($data);
            if($value){
                echo $value;
            }else{
                echo 0;
            }

        }else{
            echo 'Fill all fields.';
        }
    }
}

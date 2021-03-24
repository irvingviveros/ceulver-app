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

    // Insert record
    public function addSchool(Request $request){

        $schoolName = $request->input('school_name');
        $schoolAddress = $request->input('school_address');
        $schoolEmail = $request->input('school_email');
        $schoolAdmission = $request->input('school_admission');

        $createdBy = 1;
        $modifiedBy = 1;

        // Save date into $data var
        if($schoolName !='' && $schoolAddress !='' && $schoolEmail != '' && $schoolAdmission != ''){
            $data = array('school_name'=>$schoolName,"address"=>$schoolAddress,"email"=>$schoolEmail, "enable_online_admission"=>$schoolAdmission, "created_by"=>$createdBy, "modified_by"=>$modifiedBy);

            // Call insertData() method of Page Model
            $value = School::insertData($data);
            if($value){
                echo $value;
            }else{
                echo 0;
            }

        }else{
            echo 'Fill all fields.';
        }

        exit;
    }

    public function create()
    {

    }

    public function store()
    {

    }
}

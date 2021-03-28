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
            ['link' => 'home', 'name' => "Inicio"], ['link' => "javascript:void(0)", 'name' => "Administrador"], ['name' => "Administrar escuelas"]
        ];
        return view('modules.admin.school.index', ['breadcrumbs' => $breadcrumbs]);
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

        } else {
            echo 'Fill all fields.';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find school by id
        $school = School::findOrFail($id);
        return view('modules.admin.school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $school = School::findOrFail($id);

        if ($request->hasFile('school-logo')) {
            $file = $request->file('school-logo');
            $extension = $file -> getClientOriginalExtension(); //get original file extension
            $name = uniqid().'.'.$extension; //assign new file name
            $file->move(public_path() . '/images/uploads/schools/logo', $name);
        }

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

            $school->save();

            return redirect('admin/manage-schools')->with('status', 'La escuela se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school -> delete();
        return redirect('admin/manage-schools')->with('status', 'La escuela se ha eliminado correctamente');
    }
}

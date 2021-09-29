<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"], ['link' => "javascript:void(0)", 'name' => "Carreras"], ['name' => "Administrar carreras"]
        ];
        return view('modules.career.list.index', ['breadcrumbs' => $breadcrumbs]);
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
        // Request career data
        $career_name = $request->input('name');
        $enrollment = $request->input('enrollment');
        $opening_date = $request->input('opening_date');

        // Request current user data
        $user = auth()->user();
        $createdBy = $user->id;
        $modifiedBy = $user->id;

        // Save date into $data var
        if($career_name !='' && $enrollment !='' && $opening_date !=''){
            $data = array('name'=>$career_name,"enrollment"=>$enrollment,"opening_date"=>$opening_date, "created_by"=>$createdBy, "modified_by"=>$modifiedBy);

            // Call insertData() method of School Model
            $value = Career::insertData($data);
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
        // Find career by id
        $career = Career::findOrFail($id);
        return view('modules.career.list.edit', compact('career'));
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
        $career = Career::findOrFail($id);
        $career -> delete();
        return redirect('admin/manage-careers')->with('status', 'La carrera se ha eliminado correctamente');
    }
}

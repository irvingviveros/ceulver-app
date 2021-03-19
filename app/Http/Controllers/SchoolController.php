<?php

namespace App\Http\Controllers;

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
        return view('modules.school', ['breadcrumbs' => $breadcrumbs]);
    }
}

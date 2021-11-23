<?php
declare(strict_types=1);

namespace App\StudentConvention\Controllers;

use App\Http\Controllers\Controller;
use Domain\StudentConvention\Service\StudentConventionService;
use Illuminate\Http\Request;
use Infrastructure\School\Model\School;
use Infrastructure\StudentConvention\Model\StudentConvention;
use Infrastructure\StudentConvention\Repository\EloquentStudentConventionRepository;

class StudentConventionController extends Controller
{
    private StudentConvention $studentConventionModel;
    private EloquentStudentConventionRepository $studentConventionRepository;
    private StudentConventionService $studentConventionService;

    public function __construct()
    {
        $this->studentConventionModel = new StudentConvention();
        $this->studentConventionRepository = new EloquentStudentConventionRepository($this->studentConventionModel);
        $this->studentConventionService = new StudentConventionService($this->studentConventionRepository);
    }

    public function index()
    {
        $studentTypes = StudentConvention::all();

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Alumnos"],
            ['name' => "Convenio de alumnos"]
        ];
        return view(
            'modules.student.convention.index', ['breadcrumbs' => $breadcrumbs],
            compact('studentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studentTypes = StudentConvention::all();
        $schools = School::all();

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"], ['link' => "javascript:void(0)", 'name' => "Alumnos"],
            ['link' => "admin/manage-students/convention", 'name' => "Tipo de alumnos"], ['name' => "Nuevo tipo de alumno"]
        ];

        return view('modules.student.convention.create', ['breadcrumbs' => $breadcrumbs], compact(['studentTypes', 'schools']));
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
        $studentType = $request->input('student-type');
        $studentTypeNotes = $request->input('student-type-note');
        $schoolId = $request->input('school-id');

        // Request current user data
        $user = auth()->user();
        $createdBy = $user->id;
        $modifiedBy = $user->id;

        // Save date into $data var
        if($studentType !=''){
            $data = array
            (
                'type'=>$studentType,
                "note"=>$studentTypeNotes,
                "created_by"=>$createdBy,
                "modified_by"=>$modifiedBy,
                "school_id"=>$schoolId
            );

            // Insert data into the DB
            $value = StudentConvention::insertData($data);
            if($value > 0){
                return redirect(route('convention.index'))->with('status', 'El nuevo tipo de alumno se ha creado correctamente.');
            }else{
                return redirect(route('convention.index'))->with('status', 'El tipo de alumno es repetido, intente uno nuevo.');
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
        // Find student type by id
        $studentType = StudentConvention::findOrFail($id);
        return view('modules.student.convention.edit', compact('studentType'));
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
        $studenType = StudentConvention::findOrFail($id);

        $studenType->type = $request->input('student-type');
        $studenType->note = $request->input('student-type-note');
        $studenType->type = $request->input('student-type');

        $studenType->save();
        return redirect(route('convention.index'))->with('status', 'Se ha actualizado el registro correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentType = StudentConvention::findOrFail($id);
        $studentType -> delete();
        return redirect(route('convention.index'))->with('status', 'Se ha eliminado el registro correctamente.');
    }
}

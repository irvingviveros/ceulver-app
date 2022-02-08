<?php
declare(strict_types = 1);

namespace App\Teacher\Controller;

use App\Http\Controllers\Controller;
use Domain\Teacher\Service\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Infrastructure\School\Repository\EloquentSchoolRepository;
use Infrastructure\Teacher\Repository\EloquentTeacherRepository;

class TeacherController extends Controller
{
    private TeacherService $teacherService;

    public function __construct()
    {
        $this->teacherService = new TeacherService(
            new EloquentTeacherRepository()
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        // Initialize variables
        $teachers = $this->teacherService->getAll();

        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Maestros"],
            ['name' => "Administración de maestros"]
        ];

        return view(
            'modules.teacher.index',
            ['breadcrumbs' => $breadcrumbs], compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $schoolRepository = new EloquentSchoolRepository();
        $schools = $schoolRepository->all();

        return view('modules.teacher.actions.modal-add-teacher', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
//        // Declare new Agreement object
//        $teacherEntity = new TeacherEntity();
//        $teacher = new Teacher();
//
//        // Request current user data
//        $user = auth()->user();
//        $createdBy  = $user->id;
//        $modifiedBy = $user->id;
//
//        // Request and set teacher data
//        $teacherEntity->setSchoolId();
//
//        // Save resume
//        $temporaryFile = TemporaryFile::where('folder', $request->resume)->first();
//        if ($temporaryFile) {
//            $teacher
//                ->addMedia(storage_path('app/public/resumes/tmp/' . $request->resume . '/' . $temporaryFile->filename))
//                ->toMediaCollection('resumes');
//            rmdir(storage_path('app/public/resumes/tmp/' . $request->resume));
//            $temporaryFile->delete();
//        }
//
//        //TODO: Cleanup temporary files database tables and files, make artisan command https://youtu.be/GRXaCfS1qj0
//        return \response();
    }

    /**
     * Get information of subjects
     */
    public function getList() {

        //Initialize variables
        $teachers = $this->teacherService->getAll();

        return view(
            'modules.academics.subject.list.list', compact('teachers')
        );
    }
}

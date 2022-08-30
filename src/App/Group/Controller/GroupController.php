<?php
declare(strict_types = 1);

namespace App\Group\Controller;

use Domain\Career\Service\CareerService;
use Domain\Group\Entity\GroupEntity;
use Domain\School\Service\SchoolService;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Group;

use Domain\Group\Service\GroupService;

use Infrastructure\Career\Repository\EloquentCareerRepository;
use Infrastructure\Group\Repository\EloquentGroupRepository;
use Infrastructure\School\Repository\EloquentSchoolRepository;

class GroupController extends Controller
{
    private GroupService $groupService;
    private SchoolService $schoolService;

    /**
     *
     */
    public function __construct()
    {
        $this->groupService = new GroupService(
            new EloquentGroupRepository()
        );

        $this->schoolService = new SchoolService(
            new EloquentSchoolRepository()
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        //Initialize variables
        $groups = $this->groupService->with('school.educationalSystem');
        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => "javascript:void(0)", 'name' => "Grupos"],
            ['name' => "Administrar grupos"]
        ];

        return view(
            'modules.academics.groups.index',
            ['breadcrumbs' => $breadcrumbs], compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $schools = $this->schoolService->getAll();
        return view('modules.academics.groups.actions.modal-add-group', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Initialize variables
        $group = new GroupEntity();

        // Request current user data
        $user = auth()->user();
        $createdBy  = $user->id;
        $modifiedBy = $user->id;

        // Request career data
        $group->setSchoolId((int)$request->input('school_id'));
        $group->setName($request->input('name'));
        $group->setNote($request->input('note'));

        try {
            $id = $this->groupService->create(
                $group, $createdBy, $modifiedBy
            );
            return response($id, 200);

        } catch (OperationNotPermittedCeulverException $opx) {
            return response($opx->getMessage(), 400);
        } catch (Exception $ex) {

            Log::info($ex->getMessage());   //Send error message to Log

            return response("Error interno del servidor", 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     * @throws \Domain\Shared\Exception\ValueNotFoundException
     */
    public function edit($id): View
    {
        $group = null;

        if ($id > 0) {
            try {
                $group = $this->groupService->findById($id);
            } catch (Exception $exception) {
                Log::info($exception->getMessage());
            }
        }

        return view(
            'modules.academics.groups.actions.modal-edit-group', compact('group')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request)
    {
        // Initialize variables
        $groupEntity = new GroupEntity();

        // Request current user data
        $user = auth()->user();
        $modifiedBy = $user->id;

        // Request career data
        $id = $request->input('id');
        $groupEntity->setName($request->input('name'));
        $groupEntity->setNote($request->input('note'));

        $this->groupService->update(
            $id, $groupEntity, $modifiedBy
        );

        return response("");
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            $this->groupService->delete($id);
        } catch (OperationNotPermittedCeulverException $exception) {
            return new Response($exception->getMessage(), 400);
        } catch (Exception $exception) {
            // TODO CAMBIAR POR VISTA DE ERROR INTERNO
            // TODO enviar mensaje de error al log
            return new Response('Error interno en el servidor', 500);
        }
    }

    /**
     * Get information of agreements
     */
    public function getList() {

        $groups = $this->groupService->with('school.educationalSystem');

        return view(
            'modules.academics.groups.list.list', compact('groups')
        );
    }
}

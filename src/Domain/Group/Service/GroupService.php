<?php
declare(strict_types=1);

namespace Domain\Group\Service;

use Domain\Group\Entity\GroupEntity;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Group\Repository\EloquentGroupRepository;

class GroupService
{
    private EloquentGroupRepository $groupRepository;

    public function __construct(GlobalRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function getAll(): Collection|array
    {
        return $this->groupRepository->all();
    }

    public function create(GroupEntity $groupEntity, $createdBy, $modifiedBy): int
    {
        // TODO: Validaciones?

        $data = array(
            'name' => $groupEntity->getName(),
            'note' => $groupEntity->getNote(),
            'school_id' => $groupEntity->getSchoolId(),
            'created_by' => $createdBy,
            'modified_by' => $modifiedBy
        );

        $groupId = $this->groupRepository->create($data);

        // If the group exists, then, return the ID
        if ($groupId > 0) {
            return $groupId;
        }

        // If the student doesn't exist, then return 0
        return 0;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $student = $this->groupRepository->findById($id);

        if ($student == null) {
            throw new ValueNotFoundException(
                "El grupo no existe"
            );
        }

        return $student;
    }

    public function update($id, GroupEntity $groupEntity, $modifiedBy)
    {
        $group = $this->findById($id);

        //TODO: Busca en la bd si ya existe un registro igual

        $group->name = $groupEntity->getName();
        $group->note = $groupEntity->getNote();
        $group->modified_by = $modifiedBy;

        $this->groupRepository->update($group);
    }

    public function delete($id)
    {
        $group = $this->findById($id);

        $this->groupRepository->delete($group);
    }

    public function with($relation){
        return $this->groupRepository->with($relation);
    }
}

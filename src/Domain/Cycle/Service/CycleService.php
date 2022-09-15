<?php
declare(strict_types=1);

namespace Domain\Cycle\Service;

use Domain\Cycle\Entity\CycleEntity;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Cycle\Repository\EloquentCycleRepository;

class CycleService
{
    private EloquentCycleRepository $cycleRepository;

    public function __construct(GlobalRepository $cycleRepository)
    {
        $this->cycleRepository = $cycleRepository;
    }

    public function getAll(): Collection|array
    {
        return $this->cycleRepository->all();
    }

    public function create(CycleEntity $cycleEntity, $createdBy, $modifiedBy): int
    {
        // TODO: Validaciones?

        $data = array(
            'name' => $cycleEntity->getName(),
            'note' => $cycleEntity->getNote(),
            'syllabus_id' => $cycleEntity->getSyllabusId(),
            'created_by' => $createdBy,
            'modified_by' => $modifiedBy
        );

        $cycleId = $this->cycleRepository->create($data);

        // If the cycle exists, then, return the ID
        if ($cycleId > 0) {
            return $cycleId;
        }

        // If the cycle doesn't exist, then return 0
        return 0;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $cycle = $this->cycleRepository->findById($id);

        if ($cycle == null) {
            throw new ValueNotFoundException(
                "El ciclo no existe"
            );
        }

        return $cycle;
    }

    public function update($id, CycleEntity $cycleEntity, $modifiedBy)
    {
        $cycle = $this->cycleRepository->findById($id);

        //TODO: Busca en la bd si ya existe un registro igual

        $cycle->name = $cycleEntity->getName();
        $cycle->note = $cycleEntity->getNote();
        $cycle->modified_by = $modifiedBy;

        $this->cycleRepository->update($cycle);
    }

    public function delete($id)
    {
        $cycle = $this->cycleRepository->findById($id);

        $this->cycleRepository->delete($cycle);
    }

    public function with($relation)
    {
        return $this->cycleRepository->with($relation);
    }

    public function where($column, $id): Collection|array
    {
        return $this->cycleRepository->where($column, $id);
    }
}

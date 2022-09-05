<?php
declare(strict_types=1);

namespace Domain\Syllabus\Service;

use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Shared\Repository\GlobalRepository;
use Domain\Syllabus\Entity\SyllabusEntity;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Syllabus\Repository\EloquentSyllabusRepository;

class SyllabusService
{
    private EloquentSyllabusRepository $syllabusRepository;

    public function __construct(GlobalRepository $syllabusRepository)
    {
        $this->syllabusRepository = $syllabusRepository;
    }

    public function getAll(): Collection|array
    {
        return $this->syllabusRepository->all();
    }

    public function create(SyllabusEntity $syllabusEntity, $createdBy, $modifiedBy): int
    {
        // TODO: Validaciones?

        $data = array(
            'name' => $syllabusEntity->getName(),
            'note' => $syllabusEntity->getNote(),
            'school_id' => $syllabusEntity->getSchoolId(),
            'career_id' => $syllabusEntity->getCareerId(),
            'created_by' => $createdBy,
            'modified_by' => $modifiedBy
        );

        $syllabusId = $this->syllabusRepository->create($data);

        // If the syllabus exists, then, return the ID
        if ($syllabusId > 0) {
            return $syllabusId;
        }

        // If the student doesn't exist, then return 0
        return 0;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $syllabus = $this->syllabusRepository->findById($id);

        if ($syllabus == null) {
            throw new ValueNotFoundException(
                "La retícula no existe"
            );
        }

        return $syllabus;
    }

    public function update($id, SyllabusEntity $syllabusEntity, $modifiedBy)
    {
        $syllabus = $this->findById($id);

        //TODO: Busca en la bd si ya existe un registro igual

        $syllabus->name = $syllabusEntity->getName();
        $syllabus->note = $syllabusEntity->getNote();
        $syllabus->modified_by = $modifiedBy;

        $this->syllabusRepository->update($syllabus);
    }

    public function delete($id)
    {
        $syllabus = $this->findById($id);

        $this->syllabusRepository->delete($syllabus);
    }

    public function with($relation){
        return $this->syllabusRepository->with($relation);
    }
}

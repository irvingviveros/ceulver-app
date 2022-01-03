<?php
declare(strict_types=1);

namespace Domain\AcademicYear\Service;

use Carbon\Carbon;
use Domain\AcademicYear\Entity\AcademicYearEntity;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;
use Domain\Shared\Repository\GlobalRepository;
use Infrastructure\AcademicYear\Repository\EloquentAcademicYearRepository;

class AcademicYearService
{
    private EloquentAcademicYearRepository $academicYearRepository;

    public function __construct(GlobalRepository $academicYearRepository)
    {
        $this->academicYearRepository = $academicYearRepository;
    }

    public function getAll()
    {
        return $this->academicYearRepository->all();
    }

    /**
     * @throws OperationNotPermittedCeulverException
     */
    public function create(AcademicYearEntity $academicYear, $createdBy, $modifiedBy): int
    {
        if ($academicYear->getStartDate() && $academicYear->getEndDate() == '') {
            throw new OperationNotPermittedCeulverException(
                'Las fechas se encuentran vacías'
            );
        }

        // Verify if the academic year exist
        if ($this->academicYearRepository->checkIfNameExists($academicYear->getSessionCode())){
            throw new OperationNotPermittedCeulverException(
                "Ya una generación con las mismas fechas"
            );
        }

        $data = array(
            'school_id'     => $academicYear->getSchoolId(),
            'session_code'  => $academicYear->getSessionCode(),
            'start_date'    => $academicYear->getStartDate(),
            'end_date'      => $academicYear->getEndDate(),
            'note'          => $academicYear->getNote(),
            'is_running'    => $academicYear->isRunning(),
            'created_by'    => $createdBy,
            'modified_by'   => $modifiedBy
        );

        $academicYearId = $this->academicYearRepository->create($data);

        // If subject exists, then return the ID
        if ($academicYearId > 0) {
            return $academicYearId;
        }

        // If no subject exist, then return 0
        return 0;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id)
    {
        $academicYear = $this->academicYearRepository->findById($id);

        if ($academicYear == null) {
            throw new ValueNotFoundException(
                "La generación no existe"
            );
        }

        return $academicYear;
    }

    public function update($id, AcademicYearEntity $academicYearEntity, $modifiedBy)
    {
        $academicYear = $this->findById($id);

        //TODO: Busca en la bd si ya existe un registro igual

        $academicYear->session_code = $academicYearEntity->getSessionCode();
        $academicYear->start_date = $academicYearEntity->getStartDate();
        $academicYear->end_date = $academicYearEntity->getEndDate();
        $academicYear->note = $academicYearEntity->getNote();
        $academicYear->is_running = $academicYearEntity->isRunning();
        $academicYear->status = $academicYearEntity->getStatus();
        $academicYear->modified_by = $modifiedBy;

        $this->academicYearRepository->update($academicYear);
    }
    /**
     * @throws ValueNotFoundException
     */
    public function delete($id)
    {
        $academicYear = $this->findById($id);

        $this->academicYearRepository->delete($academicYear);
    }

    public function calculateSessionCode(Carbon $startDate, Carbon $endDate): string
    {
        $startYear = $startDate->format('Y');
        $startMonth = $startDate->formatLocalized('%B');
        $startFullDate = ucfirst($startMonth . " " . $startYear);
        $endYear = $endDate->format('Y');
        $endMonth = $endDate->formatLocalized('%B');
        $endFullDate = ucfirst($endMonth . " " . $endYear);

        return $startFullDate . " - " . $endFullDate;
    }

    public function calculateCurrentSession(Carbon $startDate, Carbon $endDate): bool
    {
        if (Carbon::now()->gte($startDate) && Carbon::now()->lte($endDate)){
            return true;
        } else {
            return false;
        }
    }

}
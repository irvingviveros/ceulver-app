<?php
declare(strict_types=1);

namespace Infrastructure\UniqueExamCandidate\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\UniqueExamCandidate\Model\UniqueExamCandidate;

class EloquentUniqueExamCandidateRepository implements GlobalRepository
{
    public function findById($id)
    {
        return UniqueExamCandidate::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        return false;
    }

    public function create($data): bool
    {
        return DB::table('unique_exam_candidates')->insert($data);
    }

    public function update($data)
    {
        $data->save();
    }

    public function delete($data)
    {
        $data->delete();
    }

    public function all($columns = ['*'])
    {
        return UniqueExamCandidate::all($columns);
    }

    public function with($relation)
    {
        return UniqueExamCandidate::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }

    public function findOrFailWithTrashed($id)
    {
        return UniqueExamCandidate::withTrashed()->findOrFail($id);
    }

    public function lastSheetId(): int
    {
        // Initialize default value for the sheet
        $sheetNumber = 0;

        try {
            $sheetNumber = UniqueExamCandidate::withTrashed()
                ->orderBy('sheet_id', 'desc')
                ->first()
                ->sheet_id ?? 0;
        } catch (Exception $exception) {
        }

        return $sheetNumber;
    }

    public function createGetId($data): int
    {
        return DB::table('unique_exam_candidates')->insertGetId($data);
    }
}

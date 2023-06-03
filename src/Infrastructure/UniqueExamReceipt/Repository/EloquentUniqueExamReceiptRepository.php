<?php
declare(strict_types=1);

namespace Infrastructure\UniqueExamReceipt\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\UniqueExamReceipt\Model\UniqueExamReceipt;

class EloquentUniqueExamReceiptRepository implements GlobalRepository
{
    public function findById($id)
    {
        return UniqueExamReceipt::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        return false;
    }

    public function create($data): bool
    {
        return DB::table('unique_exam_receipts')->insert($data);
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
        return UniqueExamReceipt::all($columns);
    }

    public function with($relation)
    {
        return UniqueExamReceipt::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }

    public function findOrFailWithTrashed($id)
    {
        return UniqueExamReceipt::withTrashed()->findOrFail($id);
    }

    public function lastSheetId(): int
    {
        // Initialize default value for the sheet
        $sheetNumber = 0;

        try {
            $sheetNumber = UniqueExamReceipt::withTrashed()
                ->orderBy('sheet_id', 'desc')
                ->first()
                ->sheet_id ?? 0;
        } catch (Exception $exception) {
        }

        return $sheetNumber;
    }
}

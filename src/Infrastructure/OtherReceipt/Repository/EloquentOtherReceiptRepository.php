<?php
declare(strict_types=1);

namespace Infrastructure\OtherReceipt\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\OtherReceipt\Model\OtherReceipt;

class EloquentOtherReceiptRepository implements GlobalRepository
{

    public function findById($id)
    {
        return OtherReceipt::findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        return false;
    }

    public function create($data): bool
    {
        return DB::table('other_receipts')->insert($data);
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
        return OtherReceipt::all($columns);
    }

    public function with($relation)
    {
        return OtherReceipt::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }

    public function findOrFailWithTrashed($id)
    {
        return OtherReceipt::withTrashed()->findOrFail($id);
    }

    public function lastSheetId(): int
    {
        // Initialize default value for the sheet
        $sheetNumber = 0;

        try {
            $sheetNumber = OtherReceipt::withTrashed()
                ->orderBy('sheet_id', 'desc')
                ->first()
                ->sheet_id ?? 0;
        } catch (Exception $exception) {
        }

        return $sheetNumber;
    }
}

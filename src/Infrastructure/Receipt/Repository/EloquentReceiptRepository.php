<?php
declare(strict_types=1);

namespace Infrastructure\Receipt\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\Receipt\Model\Receipt;

class EloquentReceiptRepository implements GlobalRepository
{

    public function findById($id)
    {
        return Receipt::findOrFail($id);
    }

    public function findOrFailWithTrashed($id)
    {
        return Receipt::withTrashed()->findOrFail($id);
    }

    public function checkIfNameExists($name): bool
    {
        $row = DB::table('receipts')->where('reference', '=', $name)->get();
        return $row->count() > 0;
    }

    public function create($data): bool
    {
        return DB::table('receipts')->insert($data);
    }

    public function update($data)
    {
        $data->save();
    }

    public function delete($data)
    {
        $data->delete();
    }

    public function all($columns = ['*']): Collection|array
    {
        return Receipt::all($columns);
    }

    public function with($relation)
    {
        return Receipt::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }

    public function createGetId($data): int
    {
        return DB::table('receipts')->insertGetId($data);
    }

    public function lastInsertId(): int
    {
        return DB::table('receipts')->latest('id')->first()->id ?? 0;
    }
}

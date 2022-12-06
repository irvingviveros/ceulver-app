<?php
declare(strict_types=1);

namespace Infrastructure\StudentReceipt\Repository;

use Domain\Shared\Repository\GlobalRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Infrastructure\StudentReceipt\Model\StudentReceipt;

class EloquentStudentReceiptRepository implements GlobalRepository
{
    public function findById($id)
    {
        return StudentReceipt::findOrFail($id);
    }

    public function allByEducationalSystem(string $educationalSystem)
    {
        return DB::table('receipts')
            ->join('student_receipts', 'receipts.id', '=', 'student_receipts.receipt_id')
            ->join('students', 'student_receipts.student_id', '=', 'students.id')
            ->join('schools', 'students.school_id', '=', 'schools.id')
            ->join('educational_systems', 'schools.educational_system_id', '=', 'educational_systems.id')
            ->select('receipts.*', 'students.enrollment AS student_enrollment', 'students.id AS student_id')
            ->where('educational_systems.name', '=', $educationalSystem)
            ->orderBy('id')->latest()->get();
    }

    public function checkIfNameExists($name): bool
    {
        return false;
    }


    public function create($data): bool
    {
        return DB::table('student_receipts')->insert($data);
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
        return StudentReceipt::all($columns);
    }

    public function with($relation)
    {
        return StudentReceipt::with($relation)->get();
    }

    public function detach(Model $model)
    {
        // TODO: Implement detach() method.
    }
}

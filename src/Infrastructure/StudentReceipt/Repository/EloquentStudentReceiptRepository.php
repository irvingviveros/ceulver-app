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

    public function findOrFailWithTrashed($id)
    {
        return StudentReceipt::withTrashed()->findOrFail($id);
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

    public function allBySchoolId(int $schoolId)
    {
        return DB::table('receipts')
            ->join('student_receipts', 'receipts.id', '=', 'student_receipts.receipt_id')
            ->join('students', 'student_receipts.student_id', '=', 'students.id')
            ->join('schools', 'students.school_id', '=', 'schools.id')
            ->select('receipts.*', 'students.enrollment AS student_enrollment', 'students.id AS student_id')
            ->where('schools.id', '=', $schoolId)
            ->orderBy('id')->latest()->get();
    }

    public function lastReceiptId()
    {
        return StudentReceipt::withTrashed()
            ->orderBy('id', 'desc')
            ->first()
            ->id;
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

    public function where(string $column, string $operator, string $value): \Illuminate\Support\Collection
    {
        return DB::table('students')->where($column, $operator, $value)->get();
    }

    public function lastSheetId(): int
    {
        // Initialize default value for the sheet
        $sheetNumber = 0;

        try {
            $sheetNumber = StudentReceipt::withTrashed()
                ->orderBy('sheet_id', 'desc')
                ->first()
                ->sheet_id ?? 0;    // If returned value is null (the table does not have any receipt) return 0.
        } catch (Exception $exception) {
        }

        return $sheetNumber;
    }
}

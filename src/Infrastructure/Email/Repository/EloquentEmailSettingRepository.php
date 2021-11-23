<?php
declare(strict_types = 1);

namespace Infrastructure\Email\Repository;


use Domain\EmailSetting\Repository\EmailSettingRepository;
use Illuminate\Support\Facades\DB;
use Infrastructure\Email\Model\EmailSetting;

class EloquentEmailSettingRepository implements EmailSettingRepository {

    /**
     * @var EmailSetting
     */
    protected EmailSetting $model;

    /**
     * @param EmailSetting $emailSetting
     */
    public function __construct(EmailSetting $emailSetting)
    {
        $this->model = $emailSetting;
    }

    /**
     * @param $data
     * @return int
     */
    public function create($data)
    {
        return DB::table('email_settings')->insertGetId($data);
    }

    /**
     * @param $schoolId
     * @return bool
     */
    public function checkIfExists($schoolId): bool
    {
        $row = DB::table('email_settings')->where('school_id', $schoolId)->get();

        return $row->count() > 0;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $data
     */
    public function update($data)
    {
        $data->save();
    }

    /**
     * @param $data
     */
    public function delete($data)
    {
        $data->delete();
    }

    /**
     * @param array|mixed|string[] $columns
     * @return \Illuminate\Database\Eloquent\Collection|EmailSetting[]|EloquentEmailSettingRepository[]
     */
    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }
}
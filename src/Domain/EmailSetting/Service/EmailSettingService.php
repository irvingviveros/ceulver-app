<?php
declare(strict_types = 1);

namespace Domain\EmailSetting\Service;

use Domain\EmailSetting\Repository\EmailSettingRepository;
use Domain\Shared\Exception\OperationNotPermittedCeulverException;
use Domain\Shared\Exception\ValueNotFoundException;

class EmailSettingService
{
    private EmailSettingRepository $emailSettingRepository;

    /**
     * @param EmailSettingRepository $emailSettingRepository
     */
    public function __construct(EmailSettingRepository $emailSettingRepository) {
        $this->emailSettingRepository = $emailSettingRepository;
    }

    /**
     * @throws OperationNotPermittedCeulverException
     */
    public function create($data) {
        if ($this->emailSettingRepository->checkIfExists($data['school_id'])) {
            throw new OperationNotPermittedCeulverException(
                "Ya existe una configuración de correo para la escuela"
            );
        }

        $id = $this->emailSettingRepository->create($data);

        if ($id) {
            return $id;
        }

        return 0;
    }

    /**
     * @throws ValueNotFoundException
     */
    public function findById($id) {
        $emailSetting = $this->emailSettingRepository->findById($id);

        if ($emailSetting == null) {
            throw new ValueNotFoundException(
                "La configuración de email no existe"
            );
        }

        return $emailSetting;
    }

    /**
     * @param $data
     * @throws ValueNotFoundException
     */
    public function update($data) {
        $emailSetting = $this->findById($data['id']);

        $emailSetting->smtp_host    = $data['smtp-host'];
        $emailSetting->smtp_port    = $data['smtp-port'];
        $emailSetting->smtp_timeout = $data['smtp-timeout'];
        $emailSetting->smtp_user    = $data['smtp-user'];
        $emailSetting->smtp_pass    = $data['smtp-password'];
        $emailSetting->smtp_crypto  = $data['smtp-security'];
        $emailSetting->mail_type    = $data['smtp-type'];
        $emailSetting->char_set     = $data['smtp-charset'];
        $emailSetting->priority     = $data['smtp-priority'];
        $emailSetting->from_name    = $data['email-from-name'];
        $emailSetting->from_address = $data['email-address'];
        $emailSetting->status       = $data['email-status'];

        $this->emailSettingRepository->update($emailSetting);
    }

    /**
     * @param $id
     * @throws ValueNotFoundException
     */
    public function delete($id) {
        $emailSetting = $this->findById($id);

        $this->emailSettingRepository->delete($emailSetting);
    }
}
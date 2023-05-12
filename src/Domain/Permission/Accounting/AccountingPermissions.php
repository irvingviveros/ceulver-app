<?php
declare(strict_types=1);

namespace Domain\Permission\Accounting;

class AccountingPermissions
{
    private static array $basicPermissions = array (
        'see accounting panel'  => 'see accounting panel',
        'see accounting dashboard' => 'accounting-dashboard.index'
    );
    private static array $universityPermissions = array(
        'see university receipts index'    => 'student-receipts.university.index',
        'create university receipt'        => 'student-receipts.university.create',
        'show university receipt'          => 'student-receipts.university.show',
        'edit university receipt'          => 'student-receipts.university.edit',
        'cancel university receipt'        => 'student-receipts.university.cancel'
    );

    private static array $bachelorPermissions = array(
        'see bachelor receipts index'    => 'student-receipts.bachelor.index',
        'create bachelor receipt'        => 'student-receipts.bachelor.create',
        'show bachelor receipt'          => 'student-receipts.bachelor.show',
        'edit bachelor receipt'          => 'student-receipts.bachelor.edit',
        'cancel bachelor receipt'        => 'student-receipts.bachelor.cancel'
    );

    private static array $highSchoolPermissions = array(
        'see high school receipts index'    => 'student-receipts.high-school.index',
        'create high school receipt'        => 'student-receipts.high-school.create',
        'show high school receipt'          => 'student-receipts.high-school.show',
        'edit high school receipt'          => 'student-receipts.high-school.edit',
        'cancel high school receipt'        => 'student-receipts.high-school.cancel'
    );

    private static array $elementarySchoolPermissions = array(
        'see elementary school receipts index'    => 'student-receipts.elementary-school.index',
        'create elementary school receipt'        => 'student-receipts.elementary-school.create',
        'show elementary school receipt'          => 'student-receipts.elementary-school.show',
        'edit elementary school receipt'          => 'student-receipts.elementary-school.edit',
        'cancel elementary school receipt'        => 'student-receipts.elementary-school.cancel'
    );

    private static array $kindergartenPermissions = array(
        'see kindergarten receipts index'    => 'student-receipts.kindergarten.index',
        'create kindergarten receipt'        => 'student-receipts.kindergarten.create',
        'show kindergarten receipt'          => 'student-receipts.kindergarten.show',
        'edit kindergarten receipt'          => 'student-receipts.kindergarten.edit',
        'cancel kindergarten receipt'        => 'student-receipts.kindergarten.cancel'
    );

    private static array $nurserySchoolPermissions = array(
        'see nursery school receipts index'    => 'student-receipts.nursery-school.index',
        'create nursery school receipt'        => 'student-receipts.nursery-school.create',
        'show nursery school receipt'          => 'student-receipts.nursery-school.show',
        'edit nursery school receipt'          => 'student-receipts.nursery-school.edit',
        'cancel nursery school receipt'        => 'student-receipts.nursery-school.cancel'
    );

    private static array $otherReceiptsPermissions = array(
        'see other receipts index'    => 'student-receipts.other-receipts.index',
        'create other receipt'        => 'student-receipts.other-receipts.create',
        'show other receipt'          => 'student-receipts.other-receipts.show',
        'edit other receipt'          => 'student-receipts.other-receipts.edit',
        'cancel other receipt'        => 'student-receipts.other-receipts.cancel'
    );

    private static array $uniqueExamPermissions = array(
        'see unique exam receipts index'    => 'student-receipts.unique-exam.index',
        'create unique exam receipt'        => 'student-receipts.unique-exam.create',
        'show unique exam receipt'          => 'student-receipts.unique-exam.show',
        'edit unique exam receipt'          => 'student-receipts.unique-exam.edit',
        'cancel unique exam receipt'        => 'student-receipts.unique-exam.cancel'
    );

    public static function basicPermissions(): array
    {
        return self::$basicPermissions;
    }

    public static function university(): array
    {
        return self::$universityPermissions;
    }

    public static function bachelor(): array
    {
        return self::$bachelorPermissions;
    }

    public static function highSchool(): array
    {
        return self::$highSchoolPermissions;
    }

    public static function elementarySchool(): array
    {
        return self::$elementarySchoolPermissions;
    }

    public static function kindergarten(): array
    {
        return self::$kindergartenPermissions;
    }

    public static function nuserySchool(): array
    {
        return self::$nurserySchoolPermissions;
    }

    public static function otherReceipts(): array
    {
        return self::$otherReceiptsPermissions;
    }

    public static function uniqueExam(): array
    {
        return self::$uniqueExamPermissions;
    }
    public static function allPermissions(): array
    {
        $data = array();
        return array_merge(
            $data,
            self::basicPermissions(),
            self::university(),
            self::bachelor(),
            self::highSchool(),
            self::elementarySchool(),
            self::kindergarten(),
            self::nuserySchool(),
            self::otherReceipts(),
            self::uniqueExam(),
        );
    }

}

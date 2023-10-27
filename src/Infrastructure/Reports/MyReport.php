<?php
namespace Infrastructure\Reports;

use Exception;
use koolreport\KoolReport;
use koolreport\laravel\Friendship;
use koolreport\processes\Group;
use koolreport\processes\Sort;

class MyReport extends KoolReport
{
    use Friendship;

    /**
     * @throws Exception
     */
    function setup()
    {
        // Let say, you have "sale_database" is defined in Laravel's database settings.
        // Now you can use that database without any futher setitngs.
        $this->src('mysql')
            ->query("
                    SELECT
                    CONCAT(paternal_surname, ' ', maternal_surname, ' ', first_name) AS NOMBRE,
                    es.name AS PLANTEL,
                    payment_reference AS REFERENCIA_PAGO,
                    r.payment_concept AS CONCEPTO_PAGO,
                    r.sheet AS FOLIO,
                    r.amount AS CANTIDAD,
                    r.payment_date AS FECHA_PAGO
                    FROM students
                    INNER JOIN ceulver_app.schools s on students.school_id = s.id
                    INNER JOIN ceulver_app.educational_systems es on s.educational_system_id = es.id
                    INNER JOIN ceulver_app.student_receipts sr on students.id = sr.student_id
                    INNER JOIN ceulver_app.receipts r on sr.receipt_id = r.id
                    WHERE students.payment_reference IS NULL OR students.payment_reference LIKE 'N%' OR students.payment_reference <> '000000';
                ")
            ->pipe(new Group(array(
                    "by"=>"PLANTEL",
                    "sum"=>"CANTIDAD"
            )))->pipe(new Sort(array(
                "CANTIDAD"=>"desc"
            )))->pipe($this->dataStore("students"));
//            ->pipe($this->dataStore("students"));
    }
}

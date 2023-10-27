<?php

use koolreport\widgets\google\BarChart;
use koolreport\widgets\google\ColumnChart;
use \koolreport\widgets\koolphp\Table;
?>
<html lang="es">
<head>
    <title>My Report</title>
</head>
<body>
<?php
ColumnChart::create(array(
    "title"=>'Corte de caja',
    "dataStore"=>$this->dataStore('students'),
    "width"=>"100%",
    "height"=>"500px",
    "columns"=>array(
        "PLANTEL",
        "CANTIDAD"=>array(
            "type"=>"number",
            "label"=>"Ingreso",
            "prefix"=>"$",
            "emphasis"=>true,
            "annotation"=>function($row)
            {
                return "$".number_format($row["CANTIDAD"]);
            }
        )
    ),
    "options"=>array(
        "title"=>"Ingreso Total",
    )
));
?>

<?php
Table::create(array(
    "dataStore"=>$this->dataStore('students'),
    "columns"=>array(
        "PLANTEL"=>array(
            "label"=>"PLANTEL"
        ),
        "CANTIDAD"=>array(
            "type"=>"number",
            "label"=>"Cantidad",
            "prefix"=>"$",
        )
    ),
    "cssClass"=>array(
        "table"=>"table table-bordered table-striped"
    )
));
?>
</body>
</html>

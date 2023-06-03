<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />
    <style>
        .checkbox{
            text-align: right;
            width: 40px;
        }
        .checkbox input {
            float: right;
            padding-right: 5px;
        }
    </style>
</head>
<body class="bg-white">
<div class="" id="head">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <img
                class="mx-auto d-block opacity-50"
                src=" {{ asset('/images/logo/ceulver_inscripción.jpg')}}"
                style="width:80%"
                alt="">
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row p-2">
        <div class="col-3"></div>
        <div class="col-6">
            <p class="fw-bolder fs-3 text-center">FICHA DE INSCRIPCIÓN</p>
        </div>
        <div class="col-3 text-end">
            Fecha: 26/05/2023
        </div>
    </div>
</div>
<div class="my-2 px-5" id="text">
    <p style="text-indent: 30px; text-align: justify;">El (La) suscrito (a) <span class="text-decoration-underline">IRVING DALÍ VIVEROS HERRERA</span>,
    por medio del presente solicita ingresar al <span class="text-decoration-underline"> 4 </span>cuatrimestre de la Licenciatura
    en <span class="text-decoration-underline">SISTEMAS COMPUTACIONALES</span>, como alumno (a) de este Centro Universitario,
    Licenciatura que tiene una duración de <span class="text-decoration-underline"> 12 </span> cuatrimestres</p>.

    <p style="text-indent: 30px; text-align: justify;">Atentos a la presente solicitud este Centro Universitario, procede a asentar los
    montos concernientes a la 1.ª inscripción cuatrimestral, colegiatura mensual, credencial, seguro de estudiante, entre otros.</p>

    <div class="d-inline checkbox">
        <label>
            <input type="checkbox" id="bar" style="width: 70px; height: 30px;"> Inscripción cuatrimestral
        </label>
    </div>
</div>
</body>
</html>

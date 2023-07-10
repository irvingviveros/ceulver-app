<link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-invoice.css'))}}">

<section>
    <div class="row invoice-preview" id="print">
        <div class="col-xl-9 col-md-8 col-12">
            <div class="card invoice-preview-card">
                <div class="card-body pb-0">
                    <div class="">
                        <div class="invoice-spacing">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <img class="mx-auto d-block opacity-50"
                                         src=" {{ asset('/images/logo/ceulver_inscripción.jpg') }}"
                                        style="width:80%" alt=""
                                    >
                                </div>
                                <div class="col-2"></div>
                            </div>

                            <div class="row">
                                <div class="col-3"></div>

                                <div class="col-6">
                                    <p class="fw-bolder fs-5 text-center">FICHA DE INSCRIPCI&Oacute;N</p>
                                </div>

                                <div class="col-3 text-end">
                                    Fecha: ________
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="row">
                                <p style="text-indent: 30px; text-align: justify;">
                                    El (La) suscrito (a) <span class="text-decoration-underline">{{ $student->paternal_surname }} {{ $student->maternal_surname }} {{ $student->first_name }}</span>,
                                    por medio del presente solicita ingresar al <span class="text-decoration-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> cuatrimestre
                                    de la Licenciatura en <span class="text-decoration-underline">{{ $career->name }}</span>, como alumno (a) de este Centro
                                    Universitario, Licenciatura que tiene una duración de <span class="text-decoration-underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> cuatrimestres.
                                </p>

                                <p style="text-indent: 30px; text-align: justify;">
                                    Atentos a la presente solicitud este Centro Universitario, procede a asentar los montos concernientes a la
                                    1.ª inscripción cuatrimestral, colegiatura mensual, credencial, seguro de estudiante, entre otros.
                                </p>
                            </div>

                            {{-- MONTOS DE INSCRIPCION --}}
                            <div class="row invoice-spacing">
                                <table style="border-collapse: separate; border-spacing: 10px;">
                                    <thead>
                                        <tr>
                                            <th style="width: 160px;"></th>
                                            <th></th>
                                            <th style="width: 100px;"></th>
                                            <th style="width: 160px;"></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Inscripci&oacute;n Cuatrimestral</td>

                                            <td style="align-content: left;">
                                                <div style="position: relative; width: 150px; height: 30px; border: 1px solid #000000; display: flex; align-items: center;"></div>
                                            </td>

                                            <td></td>

                                            <td>Colegiatura Mensual</td>

                                            <td style="align-content: left;">
                                                <div style="position: relative; width: 150px; height: 30px; border: 1px solid #000000; display: flex; align-items: center;"></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Credencial de Estudiante</td>

                                            <td style="align-content: left;">
                                                <div style="position: relative; width: 150px; height: 30px; border: 1px solid #000000; display: flex; align-items: center;"></div>
                                            </td>

                                            <td></td>

                                            <td>Seguro de Estudiante</td>

                                            <td style="align-content: left;">
                                                <div style="position: relative; width: 150px; height: 30px; border: 1px solid #000000; display: flex; align-items: center;"></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Kit de seguridad</td>

                                            <td style="align-content: left;">
                                                <div style="position: relative; width: 150px; height: 30px; border: 1px solid #000000; display: flex; align-items: center;"></div>
                                            </td>

                                            <td></td>

                                            <td></td>

                                            <td style="align-content: left;">
                                                <div style="position: relative; width: 150px; height: 30px; border: 1px solid #fff; display: flex; align-items: center;"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            {{-- DATOS DEL ALUMNO --}}
                            <div class="row" class="invoice-spacing">
                                <div class="col-3"></div>

                                <div class="col-6">
                                    <p class="fw-bolder fs-6 text-center">
                                        <span class="text-decoration-underline">
                                            DATOS DEL ALUMNO
                                        </span>
                                    </p>
                                </div>

                                <div class="col-3"></div>
                            </div>

                            <div class="row">
                                <table style="border-collapse: separate; border-spacing: 10px;">
                                    <thead>
                                        <tr>
                                            <th style="width: 8.33%"></th>
                                            <th style="width: 8.33%"></th>
                                            <th style="width: 8.33%"></th>
                                            <th style="width: 8.33%"></th>
                                            <th style="width: 8.33%"></th>
                                            <th style="width: 8.33%"></th>
                                            <th style="width: 8.33%"></th>
                                            <th style="width: 8.33%"></th>
                                            <th style="width: 8.33%"></th>
                                            <th style="width: 8.33%"></th>
                                            <th style="width: 8.33%"></th>
                                            <th style="width: 8.33%"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td align="left">Nombre:</td>
                                            <td align="center" colspan="4" style="border-bottom: 1px solid #000;">{{ $student->paternal_surname }}</td>
                                            <td align="center" colspan="4" style="border-bottom: 1px solid #000;">{{ $student->maternal_surname }}</td>
                                            <td align="center" colspan="3" style="border-bottom: 1px solid #000;">{{ $student->first_name }}</td>
                                        </tr>

                                        <tr>
                                            <td style="border-spacing: 0;"></td>
                                            <td align="center" colspan="4" style="border-spacing: 0;"><span style="font-size: 13px;">Apellido Paterno</span></td>
                                            <td align="center" colspan="4" style="border-spacing: 0;"><span style="font-size: 13px;">Apellido Materno</span></td>
                                            <td align="center" colspan="3" style="border-spacing: 0;"><span style="font-size: 13px;">Nombre(s)</span></td>
                                        </tr>

                                        <tr>
                                            <td align="left">Domicilio:</td>
                                            <td align="center" colspan="5" style="border-bottom: 1px solid #000;">{{ $student->address }}</td>
                                            <td align="center" colspan="2" style="border-bottom: 1px solid #000;">{{ $student->street_number }}</td>
                                            <td align="center" colspan="4" style="border-bottom: 1px solid #000;">{{ $student->neighborhood }}</td>
                                        </tr>

                                        <tr style="border-spacing: 0;">
                                            <td style="border-spacing: 0;"></td>
                                            <td align="center" colspan="5"><span style="font-size: 13px; border-spacing: 0;">Calle</span></td>
                                            <td align="center" colspan="2"><span style="font-size: 13px; border-spacing: 0;">No.</span></td>
                                            <td align="center" colspan="4"><span style="font-size: 13px; border-spacing: 0;">Colonia o Fraccionamiento</span></td>
                                        </tr>

                                        <tr>
                                            <td align="left">Entre:</td>
                                            <td colspan="8" align="center" style="border-bottom: 1px solid #000;">{{ $student->between_streets }}</td>
                                            <td align="right">C.P.:</td>
                                            <td colspan="2" align="center" style="border-bottom: 1px solid #000;">{{ $student->zip }}</td>
                                        </tr>

                                        <tr style="border-spacing: 0;">
                                            <td align="left">Ciudad:</td>
                                            <td colspan="3" align="center" style="border-bottom: 1px solid #000;">{{ $student->city }}</td>
                                            <td align="right">Estado:</td>
                                            <td colspan="3" align="center" style="border-bottom: 1px solid #000;">{{ $student->state }}</td>
                                            <td align="right" colspan="2">Estado Civil:</td>
                                            <td colspan="2" align="center" style="border-bottom: 1px solid #000;">{{ $student->marital_status }}</td>
                                        </tr>

                                        <tr>
                                            <td align="left">Nacionalidad:</td>
                                            <td colspan="3" align="center" style="border-bottom: 1px solid #000;">{{ $student->nationality }}</td>
                                            <td align="right">Edad:</td>
                                            <td colspan="3" align="center" style="border-bottom: 1px solid #000;">{{ $student->age }}</td>
                                            <td align="right">G&eacute;nero:</td>
                                            <td colspan="3" align="center" style="border-bottom: 1px solid #000;">{{ $student->sex }}</td>
                                        </tr>

                                        <tr>
                                            <td align="left">CURP:</td>
                                            <td colspan="6" align="center" style="border-bottom: 1px solid #000;">{{ $student->national_id }}</td>
                                            <td align="right">Ocupaci&oacute;n:</td>
                                            <td colspan="4" align="center" style="border-bottom: 1px solid #000;">{{ $student->occupation }}</td>
                                        </tr>

                                        <tr>
                                            <td align="left">Email:</td>
                                            <td colspan="5" align="center" style="border-bottom: 1px solid #000;">{{ $student->personal_email }}</td>
                                            <td align="right" colspan="2">Tels. de contacto</td>
                                            <td colspan="4" align="center" style="border-bottom: 1px solid #000;">{{ $student->personal_phone }}</td>
                                        </tr>

                                        <tr>
                                            <td align="left" colspan="2">Tipo de sangre:</td>
                                            <td colspan="10" align="center" style="border-bottom: 1px solid #000;">{{ $student->blood_group }}</td>
                                        </tr>

                                        <tr>
                                            <td align="left" colspan="2">Alergias:</td>
                                            <td colspan="10" align="center" style="border-bottom: 1px solid #000;">{{ $student->allergies }}</td>
                                        </tr>

                                        <tr>
                                            <td align="left" colspan="2">Alg&uacute;n padecimiento:</td>
                                            <td colspan="10" align="center" style="border-bottom: 1px solid #000;">{{ $student->ailments }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            @if(isset($guardian))
                                <br>
                                <br>

                                <div class="row">
                                    <div class="col-3"></div>

                                    <div class="col-6">
                                        <p class="fw-bolder fs-5 text-center">
                                            <span class="text-decoration-underline">
                                                DATOS DEL PADRE O TUTOR
                                            </span>
                                        </p>
                                    </div>

                                    <div class="col-3"></div>
                                </div>

                                <div class="row">
                                    <table style="border-collapse: separate; border-spacing: 10px;">
                                        <thead>
                                            <tr>
                                                <th style="width: 8.33%"></th>
                                                <th style="width: 8.33%"></th>
                                                <th style="width: 8.33%"></th>
                                                <th style="width: 8.33%"></th>
                                                <th style="width: 8.33%"></th>
                                                <th style="width: 8.33%"></th>
                                                <th style="width: 8.33%"></th>
                                                <th style="width: 8.33%"></th>
                                                <th style="width: 8.33%"></th>
                                                <th style="width: 8.33%"></th>
                                                <th style="width: 8.33%"></th>
                                                <th style="width: 8.33%"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td align="left">Nombre:</td>
                                                <td align="center" colspan="4" style="border-bottom: 1px solid #000;">{{ $guardian->paternal_surname }}</td>
                                                <td align="center" colspan="4" style="border-bottom: 1px solid #000;">{{ $guardian->maternal_surname }}</td>
                                                <td align="center" colspan="3" style="border-bottom: 1px solid #000;">{{ $guardian->name }}</td>
                                            </tr>

                                            <tr>
                                                <td style="border-spacing: 0;"></td>
                                                <td align="center" colspan="4" style="border-spacing: 0;"><span style="font-size: 13px;">Apellido Paterno</span></td>
                                                <td align="center" colspan="4" style="border-spacing: 0;"><span style="font-size: 13px;">Apellido Materno</span></td>
                                                <td align="center" colspan="3" style="border-spacing: 0;"><span style="font-size: 13px;">Nombre(s)</span></td>
                                            </tr>

                                            <tr>
                                                <td align="left">Domicilio:</td>
                                                <td align="center" colspan="4" style="border-bottom: 1px solid #000;">{{ $guardian->address }}</td>
                                                <td align="center" colspan="3" style="border-bottom: 1px solid #000;">{{ $guardian->street_number }}</td>
                                                <td align="center" colspan="4" style="border-bottom: 1px solid #000;">{{ $guardian->neighborhood }}</td>
                                            </tr>

                                            <tr>
                                                <td style="border-spacing: 0;"></td>
                                                <td align="center" colspan="4" style="border-spacing: 0;"><span style="font-size: 13px;">Calle</span></td>
                                                <td align="center" colspan="3" style="border-spacing: 0;"><span style="font-size: 13px;">No.</span></td>
                                                <td align="center" colspan="4" style="border-spacing: 0;"><span style="font-size: 13px;">Colonia o Fraccionamiento</span></td>
                                            </tr>

                                            <tr>
                                                <td align="left">Parentesco:</td>
                                                <td align="center" colspan="5" style="border-bottom: 1px solid #000;">{{ $student->guardian_relationship }}</td>
                                                <td align="right" colspan="3">Tels. De Contacto</td>
                                                <td align="center" colspan="3" style="border-bottom: 1px solid #000;">{{ $guardian->phone }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            <div class="row invoice-spacing">
                                <div class="col-3"></div>

                                <div class="col-6">
                                    <p class="fw-bolder fs-6 text-center">
                                        <u>RECEPCI&Oacute;N DE DOCUMENTOS</u>
                                    </p>
                                </div>

                                <div class="col-3"></div>
                            </div>

                            <div class="row invoice-spacing">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="border: 1px solid black; text-align: center;">Documentos</th>
                                            <th style="border: 1px solid black; text-align: center;">Original</th>
                                            <th style="border: 1px solid black; text-align: center;">Copia certificada</th>
                                            <th style="border: 1px solid black; text-align: center;">Copia simple</th>
                                            <th style="border: 1px solid black; text-align: center;">Observaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">Acta de Nacimiento</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">Certificado Bachillerato</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">Identificaci&oacute;n Oficial<br>Vigente</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">Comprobante de Domicilio</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">CURP</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">6 Fotograf&iacute;as</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row invoice-spacing">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: right;">Inscrito por: ________________________________</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="row invoice-spacing">
                                <p style="text-indent: 30px; text-align: justify;">
                                    Una vez que el solicitante ha hecho entrega de la documentación antes señalada, la cual
                                    posteriormente se verificará su autenticidad, se le explica al alumno que en caso de que la misma
                                    resulte FALSA o APOCRIFA, se anulará de manera automática el trámite de inscripción sin
                                    responsabilidad alguna para este centro universitario y se dará parte a las autoridades.
                                    <b>Se procede a entregarle extracto de REGLAMENTO que rige a este Centro Universitario</b>, en los
                                    puntos que hablan lo relativo a los estudiantes, comprometiéndose el alumno a leerlo en todas y
                                    cada una de sus partes para conocer sus <b>derechos y obligaciones como alumno (a)</b> de este Centro
                                    Universitario.
                                </p>
                            </div>

                            <div class="row invoice-spacing">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: right;">
                                                ________________________________
                                                <br>Nombre y firma del alumno(a)
                                                <br><span style="font-size: 13px;">Acepto cumplir el reglamento</span>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div class="row invoice-spacing">
                                <p style="text-indent: 30px; text-align: justify;">
                                    Una vez hecho lo anterior el alumno hace entrega de los montos señalados al inicio de la presente solicitud de inscripción:
                                </p>
                            </div>

                            <div class="row invoice-spacing">
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="2" style="border: 1px solid black; text-align: center;">Inscripci&oacute;n</th>
                                            <th colspan="2" style="border: 1px solid black; text-align: center;">Mensualidad</th>
                                            <th colspan="2" style="border: 1px solid black; text-align: center;">Credencial</th>
                                            <th colspan="2" style="border: 1px solid black; text-align: center;">Seguro M&eacute;dico</th>
                                            <th colspan="2" style="border: 1px solid black; text-align: center;">Kit de Seguridad</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td style="border: 1px solid black; text-align: center;">Si</td>
                                            <td style="border: 1px solid black; text-align: center;">No</td>
                                            <td style="border: 1px solid black; text-align: center;">Si</td>
                                            <td style="border: 1px solid black; text-align: center;">No</td>
                                            <td style="border: 1px solid black; text-align: center;">Si</td>
                                            <td style="border: 1px solid black; text-align: center;">No</td>
                                            <td style="border: 1px solid black; text-align: center;">Si</td>
                                            <td style="border: 1px solid black; text-align: center;">No</td>
                                            <td style="border: 1px solid black; text-align: center;">Si</td>
                                            <td style="border: 1px solid black; text-align: center;">No</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row invoice-spacing">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="border: 1px solid black; text-align: center;">Reinscripci&oacute;n</th>
                                            <th style="border: 1px solid black; text-align: center;">Nombre y firma del alumno</th>
                                            <th style="border: 1px solid black; text-align: center;">Fecha</th>
                                            <th style="border: 1px solid black; text-align: center;">Ciclo Escolar</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">2do. Cuatrimestre</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">3ro. Cuatrimestre</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">4to. Cuatrimestre</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">5to. Cuatrimestre</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">6to. Cuatrimestre</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">7mo. Cuatrimestre</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">8vo. Cuatrimestre</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>

                                        <tr>
                                            <td style="border: 1px solid black; text-align: center; font-weight: bold;">9no. Cuatrimestre</td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                            <td style="border: 1px solid black;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row invoice-spacing">
                                <p style="text-indent: 30px; text-align: justify;">
                                    As&iacute; como todo lo anterior en este caso de mi libre y entera voluntad declaro y acepto que el
                                    Centro Universitario no tiene ning&uacute;n tipo de obligaci&oacute;n de otorgarme alg&uacute;n tipo de plaza o
                                    contrato laboral al momento de concluir mis estudios universitarios, por otra parte reconozco y
                                    acepto que este Centro Universitario solo me otorgar&aacute; preparaci&oacute;n acad&eacute;mica, certificado de
                                    estudios, carta de pasant&iacute;a, carta de liberaci&oacute;n de servicio social, t&iacute;tulo profesional y c&eacute;dula
                                    profesional, previo cumplimiento de cuotas y requisitos aplicables a cada caso.
                                    <br>
                                    <br>
                                    Por otra parte, me doy por enterado que el Centro Universitario Latino Veracruz se reserva el
                                    derecho de posponer o cancelar la apertura de un grupo si no se cubre el cupo m&iacute;nimo requerido.
                                </p>
                            </div>

                            <div class="row invoice-spacing">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">
                                                ________________________________
                                                <br>Nombre y firma del alumno(a)
                                            </th>

                                            <th style="text-align: center;">
                                                ________________________________
                                                <br>Nombre y firma del padre o tutor
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <br>
                            <br>

                            <div class="row invoice-spacing">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">
                                                ________________________________
                                                <br>Control Escolar
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2" id="print-ignore">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary w-100 mb-75" id="print-btn" target="_blank">Descargar o imprimir
                    </a>
                </div>
            </div>
        </div>
        <!-- Actions -->
    </div>
</section>

{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <title>Title</title>--}}
{{--    <link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />--}}
{{--    <style>--}}
{{--        .checkbox {--}}
{{--            text-align: right;--}}
{{--            width: 40px;--}}
{{--        }--}}

{{--        .checkbox input {--}}
{{--            float: right;--}}
{{--            padding-right: 5px;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}

{{--<body class="bg-white">--}}
{{--    <div class="" id="head">--}}
{{--        <div class="row">--}}
{{--            <div class="col-2"></div>--}}
{{--            <div class="col-8">--}}
{{--                <img class="mx-auto d-block opacity-50" src=" {{ asset('/images/logo/ceulver_inscripción.jpg') }}"--}}
{{--                    style="width:80%" alt="">--}}
{{--            </div>--}}
{{--            <div class="col-2"></div>--}}
{{--        </div>--}}
{{--        <div class="row p-2">--}}
{{--            <div class="col-3"></div>--}}
{{--            <div class="col-6">--}}
{{--                <p class="fw-bolder fs-3 text-center">FICHA DE INSCRIPCIÓN</p>--}}
{{--            </div>--}}
{{--            <div class="col-3 text-end">--}}
{{--                Fecha: 26/05/2023--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="my-2 px-5" id="text">--}}
{{--        <p style="text-indent: 30px; text-align: justify;">El (La) suscrito (a) <span--}}
{{--                class="text-decoration-underline">IRVING DALÍ VIVEROS HERRERA</span>,--}}
{{--            por medio del presente solicita ingresar al <span class="text-decoration-underline"> 4 </span>cuatrimestre--}}
{{--            de la Licenciatura--}}
{{--            en <span class="text-decoration-underline">SISTEMAS COMPUTACIONALES</span>, como alumno (a) de este Centro--}}
{{--            Universitario,--}}
{{--            Licenciatura que tiene una duración de <span class="text-decoration-underline"> 12 </span> cuatrimestres</p>--}}
{{--        .--}}

{{--        <p style="text-indent: 30px; text-align: justify;">--}}
{{--            Atentos a la presente solicitud este Centro Universitario, procede a asentar los montos concernientes a la--}}
{{--            1.ª inscripción cuatrimestral, colegiatura mensual, credencial, seguro de estudiante, entre otros.--}}
{{--        </p>--}}
{{--    </div>--}}

{{--    <div class="my-2 px-5 row">--}}
{{--        <table>--}}
{{--            <tbody>--}}
{{--                <tr style="padding-bottom: 10px;">--}}
{{--                    <td>--}}
{{--                        Inscripción cuatrimestral--}}
{{--                    </td>--}}

{{--                    <td>--}}
{{--                        <input type="text" readonly style="width: 200px;" id="inscripcion-cuatrimestral">--}}
{{--                    </td>--}}

{{--                    <td>--}}
{{--                        Colegiatura mensual--}}
{{--                    </td>--}}

{{--                    <td>--}}
{{--                        <input type="text" readonly style="width: 200px;" id="colegiatura-mensual">--}}
{{--                    </td>--}}
{{--                </tr>--}}

{{--                <tr style="margin-bottom: 10px;">--}}
{{--                    <td>--}}
{{--                        Credencial de estudiante--}}
{{--                    </td>--}}

{{--                    <td>--}}
{{--                        <input type="text" style="width: 200px;" id="credencial-estudiante">--}}
{{--                    </td>--}}

{{--                    <td>--}}
{{--                        Seguro de Estudiante--}}
{{--                    </td>--}}

{{--                    <td>--}}
{{--                        <input type="text" style="width: 200px;" id="seguro-estudiante">--}}
{{--                    </td>--}}
{{--                </tr>--}}

{{--                <tr>--}}
{{--                    <td>--}}
{{--                        Kit de seguridad--}}
{{--                    </td>--}}

{{--                    <td>--}}
{{--                        <input type="text" style="width: 200px;" id="kit-seguridad">--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--</body>--}}

{{--</html>--}}


<!-- Local JS -->
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script>
    $('#print-btn').on("click", function () {
        printJS(
            {
                printable: 'print',
                type: 'html',
                css: [
                    '/css/base/pages/app-invoice.css',
                    '/css/core.css',
                ],
                ignoreElements: ['print-ignore'],
                showModal: true,
                modalMessage: 'Generando documento...',
                documentTitle: 'Ficha de inscripción'
            }
        )
    })
</script>
<!-- Local JS -->

<link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css" href="https://printjs-4de6.kxcdn.com/print.min.css">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-invoice.css'))}}">

<section>
    <div class="row invoice-preview" id="print">
        <!-- Invoice -->
        <div class="col-xl-9 col-md-8 col-12">
            <div class="card invoice-preview-card">
                <div class="card-body invoice-padding pb-0">
                    <!-- Header starts -->
                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                        <div>
                            <div class="logo-wrapper" style="margin-bottom: 0">
                                <img src="{{ asset($school->logo) }}" alt="">
                            </div>
                            <p class="card-text mb-25">{{ $school->address }}</p>
                            <p class="card-text mb-25">{{ $school->phone }}</p>
                            <p class="card-text mb-0 ">{{ $school->tax_id }}</p>
                        </div>
                        <div class="mt-md-0 mt-2">
                            <h4 class="invoice-title">
                                Folio
                                <span class="invoice-number">{{ $otherReceipt->sheet_id }}</span>
                            </h4>
                            <div class="invoice-date-wrapper">
                                <p class="invoice-date-title">Fecha pago:</p>
                                <p class="invoice-date">{{ $payment_date }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Header ends -->
                </div>

                <hr class="invoice-spacing"/>

                <!-- Address and Contact starts -->
                <div class="card-body invoice-padding pt-0">
                    <div class="row invoice-spacing">
                        <div class="col-xl-9 p-0">
                            <p class="mb-2">
                                @if(isset($student))
                                    <b>DATOS DEL ALUMNO</b>
                                @else
                                    <b>RECEPTOR</b>
                                @endif

                            </p>
                            <table>
                                <tr>
                                    <th style="width: 30%"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>
                                        <h6 class="mb-25">Nombre: </h6>
                                    </td>
                                    <td>
                                        @if(isset($student_name))
                                            {{ $student_name }}
                                        @else
                                            {{ $person_name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="card-text mb-25">Referencia: </p>
                                    </td>
                                    <td>
                                        @if(!isset($student))
                                            N/A
                                        @else
                                            {{ $student->payment_reference }}
                                        @endif
                                    </td>
                                </tr>
                                @if(isset($student))
                                    @if($school->educationalSystem->name == "Universidad")
                                        <tr>
                                            <td>
                                                <p class="card-text mb-25">Matrícula: </p>
                                            </td>
                                            <td>
                                                {{ $student->enrollment }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="card-text mb-0">Licenciatura: </p>
                                            </td>
                                            <td>
                                                {{ $student->career->name }}
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            </table>
                        </div>
                        <div class="col-xl-3 p-0 mt-xl-0 mt-2">
                            <p class="mb-2">
                                <b>DETALLES DE PAGO</b>
                            </p>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="pe-1">Forma de pago:</td>
                                    <td><span class="fw-bold">{{ $baseReceipt -> payment_method }}</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Address and Contact ends -->

                <!-- Invoice Description starts -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="py-1" style="width: 30%">CONCEPTO</th>
                            <th class="py-1" style="width: 10%">CANTIDAD</th>
                            <th class="py-1" style="width: 0"></th>
                            <th class="py-1" style="width: 40%">CANTIDAD CON LETRA</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="py-1">
                                <p class="card-text text-nowrap">
                                    {{ $baseReceipt -> payment_concept }}
                                </p>
                            </td>
                            <td class="py-1">
                                <span class="fw-bold">${{ $baseReceipt -> amount }}</span>
                            </td>
                            <td class="py-1">
                                <span class="fw-bold"></span>
                            </td>
                            <td class="py-1">
                                <span class="fw-bold">{{ $baseReceipt -> amount_text }}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Invoice Description ends -->

                <hr class="invoice-spacing"/>

                <!-- Invoice Note starts -->
                <div class="card-body invoice-padding pt-0">
                    <div class="row">
                        <div class="col-12" style="font-size: 12px">
                            <p class=" text-danger">
                                <b>COMPROBANTE SIN EFECTOS FISCALES NI LEGALES</b>
                            </p>
                            <p>* Este documento NO será válido si presenta enmiendas, raspaduras o alteraciones.</p>
                            <p>** Este documento NO será justificante de pago válido sin el sello de la institución
                                y firma autorizada.</p>
                        </div>
                    </div>
                </div>
                <!-- Invoice Note ends -->
            </div>
        </div>
        <!-- /Invoice -->

        <!-- Invoice Actions -->
        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2" id="print-ignore">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary w-100 mb-75"
                       id="print-btn"
                       target="_blank">Descargar o imprimir</a>
                    <a class="btn btn-danger w-100 mb-75" href="{{url('app/invoice/print')}}"
                       target="_blank">Cancelar recibo</a>
                </div>
            </div>
        </div>
        <!-- /Invoice Actions -->
    </div>
</section>

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
                documentTitle: 'Recibo de pago'
            }
        )
    })
</script>
<!-- Local JS -->

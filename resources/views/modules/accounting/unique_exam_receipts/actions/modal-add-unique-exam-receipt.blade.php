<form class="add-new-record row gy-2 gx-2" id="registerForm">

    <section class="invoice-edit-wrapper">
        <div class="row invoice-edit">
            <!-- Invoice Edit Left starts -->
            <div class="col-12">
                <div class="card invoice-preview-card">
                    <!-- Header starts -->
                    <div class="card-body invoice-padding pb-0">
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                            <div>
                                <div class="logo-wrapper pt-1" style="margin-bottom: 0;">
                                    <img src="{{ asset('images/logo/institución_evaluadora.png') }}" alt="" style="max-width: 300px">
                                </div>
                            </div>
                            <div class="invoice-number-date mt-md-0 mt-2">
                                <div class="d-flex align-items-center justify-content-md-end mb-1">
                                    <span class="title"><b>Folio:</b></span>
                                    <div class="input-group input-group-merge invoice-edit-input-group">
                                        <div class="input-group-text" style="background-color: #efefef">
                                            <i data-feather="hash"></i>
                                        </div>
                                        <input
                                            type="text"
                                            id="payment-sheet"
                                            name="payment_sheet"
                                            class="form-control invoice-edit-input"
                                            value="{{$lastSheet}}"
                                            disabled/>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="title">Fecha de pago:</span>
                                    <input
                                        type="text"
                                        id="payment-date"
                                        name="payment_date"
                                        class="form-control invoice-edit-input date-picker flatpickr-basic"
                                        placeholder="Seleccionar"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Header ends -->

                    <hr class="invoice-spacing"/>

                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row invoice-spacing">
                            <h6 class="mb-2">
                                <B>DATOS DEL ASPIRANTE</B>
                            </h6>
                            <div class="col-3">
                                <label class="form-label" for="firstName">Nombre(s)
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="firstName"
                                    name="firstName"
                                    placeholder="Nombre(s)"
                                    aria-label="Nombre o nombres"
                                />
                                <span for="firstName" class="text-danger"></span>
                            </div>

                            <div class="col-3">
                                <label class="form-label" for="paternalSurname">Apellido paterno
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="paternalSurname"
                                    name="paternalSurname"
                                    placeholder="Apellido paterno"
                                    aria-label="Apellido paterno"
                                />
                                <span for="paternalSurname" class="text-danger"></span>
                            </div>

                            <div class="col-3">
                                <label class="form-label" for="maternalSurname">Apellido materno
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="maternalSurname"
                                    name="maternalSurname"
                                    placeholder="Apellido materno"
                                    aria-label="Apellido materno"
                                />
                                <span for="maternalSurname" class="text-danger"></span>
                            </div>

                            <div class="col-3"></div>

                            <div class="col-3 pt-1">
                                <label class="form-label" for="rubric">Rubro
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="rubric"
                                    name="rubric"
                                    placeholder="Rubro"
                                    aria-label="Rubro"
                                />
                                <span for="rubric" class="text-danger"></span>
                            </div>

                        </div>
                        <!-- Student additional information starts -->
                        <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                            <div id="additional-info"></div>
                        </div>
                        <!-- Student additional information ends -->
                    </div>
                    <!-- Address and Contact ends -->

                    <!-- Invoice Description starts -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="py-1" style="width: 30%">CONCEPTO</th>
                                <th class="py-1" style="width: 10%">IMPORTE</th>
                                <th class="py-1" style="width: 0">FORMA DE PAGO</th>
                                <th class="py-1" style="width: 40%">IMPORTE CON LETRA</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="py-1">
                                    <select class="form-control" id="payment-concept">
                                        <option></option>
                                    </select>
                                    <span for="payment-concept" class="text-danger"></span>
                                </td>
                                <td class="py-1">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">$</span>
                                        <input type="text"
                                               id="payment-amount"
                                               class="form-control"
                                               name="payment_amount"
                                               pattern="[0-9]*"
                                               placeholder="1200.50"
                                               aria-label="Cantidad">
                                    </div>
                                <td class="py-1">
                                    <select class="form-control dropdown" name="payment_method" id="payment-method">
                                        <option selected disabled>Seleccionar...</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Pago con tarjeta">Pago con tarjeta</option>
                                        <option value="Transferencia bancaria">Transferencia bancaria</option>
                                    </select>
                                    <span for="payment-method" class="text-danger"></span>
                                </td>
                                <td class="py-1">
                                    <span class="fw-bold">
                                        <input
                                            type="text"
                                            id="money-to-text"
                                            class="form-control"
                                            value=""
                                            placeholder="Introduzca el importe"
                                            disabled readonly>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Invoice Description ends -->

                    <hr class="invoice-spacing my-1"/>

                    <div class="card-body invoice-padding py-0">
                        <!-- Invoice Note starts -->
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-2">
                                    <label for="note" class="form-label fw-bold">
                                        Nota interna - <i>(opcional)</i>:
                                    </label>
                                    <span data-bs-toggle="popover"
                                          data-bs-content="La nota solo se verá reflejada para personal administrativo.
                                          Es opcional."
                                          data-bs-trigger="hover"
                                          title data-bs-original-title="Nota interna">
                                        <i type="button" data-feather='info'></i>
                                    </span>
                                    <textarea class="form-control" rows="2" id="note"
                                              placeholder="Nota interna para fines administrativos."></textarea
                                    >
                                </div>
                            </div>
                        </div>
                        <!-- Invoice Note ends -->
                    </div>
                </div>
            </div>
            <!-- Invoice Edit Left ends -->
        </div>
    </section>

    <input type="hidden" name="unique_exam_receipt" id="unique-exam-receipt" value="">
    <input type="hidden" name="selected_payment_concept" id="selected_payment_concept" value="">
    <input type="hidden" name="last_sheet" id="last_sheet_id" value="{{$lastSheet}}">
</form>

{{-- Page scripts --}}
<script src="{{ asset(mix('vendors/js/feather-icons/feather-icons.min.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/pickers/customPickr.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/components/components-popovers.js'))}}"></script>
<script src="{{ asset(mix('js/scripts/forms/select2/select2-students-ajax.js')) }}"></script>
<script src=" {{ asset(mix('js/utils/money-to-text.js')) }}"></script>
<script>
    $('#payment-amount').on("input", function () {
        $('#money-to-text').val(numeroALetras($(this).val()));
    });
</script>
<script src="{{ asset(mix('js/utils/select2-json.js')) }}"></script>
<script>
    initializeSelect2Json('#payment-concept', "{{ asset('data/exu-receipts-payment-types.json') }}");
</script>

<script>feather.replace() //Icons</script>

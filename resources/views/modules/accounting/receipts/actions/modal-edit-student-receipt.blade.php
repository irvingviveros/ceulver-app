<link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">

<form class="add-new-record row gy-2 gx-2" id="editForm">
    <section class="invoice-edit-wrapper">
        <div class="row invoice-edit">
            <!-- Invoice Edit Left starts -->
            <div class="col-12">
                <div class="card invoice-preview-card">
                    <!-- Header starts -->
                    <div class="card-body invoice-padding pb-0">
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                            <div>
                                <div class="logo-wrapper" style="margin-bottom: 0">
                                    <img src="{{ asset($school->logo) }}" alt="">
                                </div>
                                <p class="card-text mb-25">{{ $school->address }}</p>
                                <p class="card-text mb-25">{{ $school->phone }}</p>
                                <p class="card-text mb-0 ">{{ $school->tax_id }}</p>
                            </div>
                            <div class="invoice-number-date mt-md-0 mt-2">
                                <div class="d-flex align-items-center justify-content-md-end mb-1">
                                    <span class="title"><b>Folio:</b></span>
                                    <input
                                        type="text"
                                        id="payment-sheet"
                                        name="payment_sheet"
                                        class="form-control invoice-edit-input"
                                        value="{{$baseReceipt->sheet}}"
                                        disabled/>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="title">Fecha de pago:</span>
                                    <input
                                        type="text"
                                        id="payment-date"
                                        name="payment_date"
                                        class="form-control invoice-edit-input date-picker flatpickr-basic"
                                        placeholder="Seleccionar"
                                        value=" {{ $baseReceipt -> payment_date }}"
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
                            <div class="col-xl-8 p-0">
                                <h6 class="mb-2">
                                    <B>ALUMNO | REFERENCIA DE PAGO</B>
                                </h6>

                                <!-- Select2 Remote Data -->
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-ajax">Nombre del alumno | Referencia</label>
                                    <div class="mb-1">
                                        <select class="select2-data-ajax form-select" id="select2-ajax" lang="es">
                                            <option value="{{ $student->id }}" selected="selected">{{ $student->paternal_surname }} {{ $student->maternal_surname }} {{ $student->first_name }}</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <!-- Student additional information starts -->
                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                <div id="additional-info"></div>
                            </div>
                            <!-- Student additional information ends -->
                        </div>
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
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="payment_concept"
                                        id="payment-concept"
                                        placeholder="Concepto de pago"
                                        value="{{$baseReceipt->payment_concept}}"
                                    />
                                    <span for="payment-concept" class="text-danger"></span>
                                </td>
                                <td class="py-1">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">$</span>
                                        <input type="text"
                                               id="payment-amount"
                                               class="form-control"
                                               name="payment_amount"
                                               placeholder="1200.50"
                                               value="{{ $baseReceipt->amount }}"
                                               aria-label="Cantidad">
                                    </div>
                                <td class="py-1">
                                    <select class="form-control dropdown" name="payment_method" id="payment-method">
                                        <option {{ $baseReceipt->payment_method === "Efectivo" ? 'selected' : ''}} value="Efectivo">Efectivo</option>
                                        <option {{ $baseReceipt->payment_method === "Pago con tarjeta" ? 'selected' : ''}} value="Pago con tarjeta">Pago con tarjeta</option>
                                        <option {{ $baseReceipt->payment_method === "Transferencia bancaria" ? 'selected' : ''}} value="Transferencia bancaria">Transferencia bancaria</option>
                                    </select>
                                    <span for="payment-method" class="text-danger"></span>
                                </td>
                                <td class="py-1">
                                    <span class="fw-bold">
                                        <input
                                            type="text"
                                            id="money-to-text"
                                            class="form-control"
                                            value="{{ $baseReceipt->amount_text }}"
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
                                    <textarea
                                        class="form-control"
                                        rows="2"
                                        id="note"
                                        placeholder="Nota interna para fines administrativos.">{{ $baseReceipt->note }}</textarea>
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

    <input type="hidden" name="student_id" id="student-id" value="{{ $student->id }}"/>
    <input type="hidden" name="student_receipt_id" id="student-receipt-id" value="{{ $studentReceipt->id }}"/>
    <input type="hidden" name="receipt_id" id="receipt-id" value="{{ $baseReceipt->id }}"/>
    <input type="hidden" name="student_reference" id="student-reference" value="{{ $student->payment_reference }}"/>
    <input type="hidden" name="school_code" id="school-code" value="{{$school->code}}"/>
</form>

<!-- Local JS -->
<script src="{{ asset(mix('vendors/js/feather-icons/feather-icons.min.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/pickers/customPickr.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/components/components-popovers.js'))}}"></script>
<script src="{{ asset(mix('js/scripts/forms/select2/select2-students-ajax.js')) }}"></script>
<script src=" {{ asset(mix('js/utils/money-to-text.js')) }}"></script>
<script !src="">
    $('#payment-amount').on("input", function () {
        $('#money-to-text').val(numeroALetras($(this).val()));
    });

</script>
<script>feather.replace() //Icons</script>

<!-- Local JS -->

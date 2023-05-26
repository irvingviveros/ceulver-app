<form class="add-new-record row gy-2 gx-2" id="registerForm">

    <section class="invoice-edit-wrapper">
        <div class="row invoice-edit">
            <!-- Invoice Edit Left starts -->
            <div class="col-12">
                <div class="card invoice-preview-card">
                    <!-- Header starts -->
                    <div class="card-body invoice-padding pb-0">
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                            <div class="width-300"></div>
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
                                            value="{{$lastSheetWithAcronym}}"
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
                            <div class="col-xl-8 p-0">
                                <h6 class="mb-2">
                                    <B>DATOS DEL ALUMNO | PERSONA</B>
                                </h6>
                                <!-- Select2 Remote Data -->
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-ajax">Nombre del alumno</label>
                                    <div class="mb-1">
                                        <select class="select2-data-ajax form-select" id="select2-ajax" lang="es">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="divider">
                                        <div class="divider-text">Ó</div>
                                    </div>
                                    <div>
                                        <label class="form-label" for="person-name">Nombre de la persona</label>
                                        <div class="mb-1">
                                            <input type="text" id="person-name" class="form-control" autocapitalize="characters" oninput="this.value = this.value.toUpperCase()">
                                        </div>
                                        <label for="educational-level" class="form-label fw-bold">
                                            Selecciona el nivel educativo
                                        </label>
                                        <select class="form-control dropdown" name="educational_level" id="educational-level">
                                            <option selected disabled>Seleccionar...</option>
                                            @foreach($schools as $school)
                                                <option value="{{ $school->educationalSystem->name }}">{{$school->educationalSystem->name}}</option>
                                            @endforeach
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

    <input type="hidden" name="student_id" id="student-id" value=""/>
    <input type="hidden" name="student_reference" id="student-reference" value=""/>
    <input type="hidden" name="other_receipt" id="other-receipt" value="">
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
    initializeSelect2Json('#payment-concept', "{{ asset('data/receipts-payment-types.json') }}");
</script>

<script>
    // Al cambiar el valor del select #select2-ajax
    $('#select2-ajax').change(function() {
        var selectedValue = $(this).val();

        // Si el valor seleccionado es diferente de vacío ("")
        if (selectedValue !== "") {
            // Eliminar el valor y deshabilitar el input #person-name
            $('#person-name').val('').prop('disabled', true);

            // Deshabilitar y borrar el valor seleccionado del select #educational-level
            $('#educational-level').val('').prop('disabled', true).trigger('change.select2');
        } else {
            // Habilitar el input #person-name
            $('#person-name').prop('disabled', false);

            // Habilitar el select #educational-level y restablecer su valor
            $('#educational-level').prop('disabled', false).val('').trigger('change.select2');
        }
    });

    // Al ingresar información en el input #person-name
    $('#person-name').on('input', function() {
        var inputVal = $(this).val();

        // Si el input contiene información
        if (inputVal !== "") {
            // Deshabilitar y borrar el valor seleccionado del select #select2-ajax
            $('#select2-ajax').val('').prop('disabled', true).trigger('change.select2');
        } else {
            // Habilitar el select #select2-ajax
            $('#select2-ajax').prop('disabled', false);
        }
    });

    // Al cambiar el valor del select #educational-level
    $('#educational-level').change(function() {
        var selectedValue = $(this).val();

        // Si el valor seleccionado es diferente de vacío ("")
        if (selectedValue !== "") {
            // Deshabilitar y borrar el valor seleccionado del select #select2-ajax
            $('#select2-ajax').val('').prop('disabled', true).trigger('change.select2');
        } else {
            // Habilitar el select #select2-ajax
            $('#select2-ajax').prop('disabled', false);
        }
    });
</script>
<script>feather.replace() //Icons</script>

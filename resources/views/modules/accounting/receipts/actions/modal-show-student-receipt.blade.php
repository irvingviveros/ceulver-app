<link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">

<section class="invoice-preview-wrapper">
    <div class="row invoice-preview">
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
                                <span class="invoice-number">{{ $baseReceipt->sheet }}</span>
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
                                <b>ALUMNO</b>
                            </p>
                            <h6 class="mb-25">Nombre: {{ $student_name }}</h6>
                            <p class="card-text mb-25">Referencia: {{ $student->payment_reference }}</p>
                            <p class="card-text mb-0">Licenciatura: {{ $student->career->name }}</p>
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
        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-primary w-100 mb-75" data-bs-toggle="modal"
                            data-bs-target="#send-invoice-sidebar">
                        Enviar
                    </button>
                    <button class="btn btn-outline-secondary w-100 btn-download-invoice mb-75">Descargar</button>
                    <a class="btn btn-outline-secondary w-100 mb-75" href="{{url('app/invoice/print')}}"
                       target="_blank"> Imprimir </a>
                    <a class="btn btn-danger w-100 mb-75" href="{{url('app/invoice/print')}}"
                       target="_blank"> Cancelar recibo</a>
                </div>
            </div>
        </div>
        <!-- /Invoice Actions -->
    </div>
</section>

<!-- Send Invoice Sidebar -->
<div class="modal modal-slide-in fade" id="send-invoice-sidebar" aria-hidden="true">
    <div class="modal-dialog sidebar-lg">
        <div class="modal-content p-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title">
                    <span class="align-middle">Enviar recibo</span>
                </h5>
            </div>
            <div class="modal-body flex-grow-1">
                <form>
                    <div class="mb-1">
                        <label for="invoice-from" class="form-label">From</label>
                        <input
                            type="text"
                            class="form-control"
                            id="invoice-from"
                            value="shelbyComapny@email.com"
                            placeholder="company@email.com"
                        />
                    </div>
                    <div class="mb-1">
                        <label for="invoice-to" class="form-label">To</label>
                        <input
                            type="text"
                            class="form-control"
                            id="invoice-to"
                            value="qConsolidated@email.com"
                            placeholder="company@email.com"
                        />
                    </div>
                    <div class="mb-1">
                        <label for="invoice-subject" class="form-label">Subject</label>
                        <input
                            type="text"
                            class="form-control"
                            id="invoice-subject"
                            value="Invoice of purchased Admin Templates"
                            placeholder="Invoice regarding goods"
                        />
                    </div>
                    <div class="mb-1">
                        <label for="invoice-message" class="form-label">Message</label>
                        <textarea
                            class="form-control"
                            name="invoice-message"
                            id="invoice-message"
                            cols="3"
                            rows="11"
                            placeholder="Message..."
                        >
Dear Queen Consolidated,

Thank you for your business, always a pleasure to work with you!

We have generated a new invoice in the amount of $95.59

We would appreciate payment of this invoice by 05/11/2019</textarea
                        >
                    </div>
                    <div class="mb-1">
            <span class="badge badge-light-primary">
              <i data-feather="link" class="me-25"></i>
              <span class="align-middle">Invoice Attached</span>
            </span>
                    </div>
                    <div class="mb-1 d-flex flex-wrap mt-2">
                        <button type="button" class="btn btn-primary me-1" data-bs-dismiss="modal">Send</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Send Invoice Sidebar -->

<!-- Add Payment Sidebar -->
<div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
    <div class="modal-dialog sidebar-lg">
        <div class="modal-content p-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title">
                    <span class="align-middle">Add Payment</span>
                </h5>
            </div>
            <div class="modal-body flex-grow-1">
                <form>
                    <div class="mb-1">
                        <input id="balance" class="form-control" type="text" value="Invoice Balance: 5000.00" disabled/>
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="amount">Payment Amount</label>
                        <input id="amount" class="form-control" type="number" placeholder="$1000"/>
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="payment-date">Payment Date</label>
                        <input id="payment-date" class="form-control date-picker" type="text"/>
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="payment-method">Payment Method</label>
                        <select class="form-select" id="payment-method">
                            <option value="" selected disabled>Select payment method</option>
                            <option value="Cash">Cash</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Debit">Debit</option>
                            <option value="Credit">Credit</option>
                            <option value="Paypal">Paypal</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="payment-note">Internal Payment Note</label>
                        <textarea class="form-control" id="payment-note" rows="5"
                                  placeholder="Internal Payment Note"></textarea>
                    </div>
                    <div class="d-flex flex-wrap mb-0">
                        <button type="button" class="btn btn-primary me-1" data-bs-dismiss="modal">Send</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Payment Sidebar -->

<!-- Local JS -->
<script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
<!-- Local JS -->

@extends('layouts/contentLayoutMaster')

@section('title', 'Configuración de correos')


@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')
    <!-- Basic table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table class="datatables-basic table" id="data">
                        <thead>
                        <tr>
                            <th></th>
                            <th>id</th>
                            <th>Escuela</th>
                            <th>Protocolo</th>
                            <th>Tipo</th>
                            <th>Estatus</th>
                            <th>Nombre del emisor</th>
                            <th>Correo del emisor</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">
                <form class="add-new-record modal-content pt-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">Configuración de correo</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="form-group">
                            <label class="form-label" for="school-name">Nombre de la Institución</label>
                            <select class="form-control dt-school-id" name="school-name" id="school-name">
                                @foreach($schools as $school)
                                    <option value="{{$school->id}}">{{$school->school_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-protocol">Protocolo</label>
                            <select class="form-control dt-protocol" name="email-protocol" id="school-protocol">
                                <option selected value="smtp">SMTP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="smtp-host">SMTP Host</label>
                            <input
                                    type="text"
                                    class="form-control dt-smtp-host"
                                    id="smtp-host"
                                    name="smtp-host"
                                    required
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="smtp-port">SMTP Port</label>
                            <input
                                    type="text"
                                    class="form-control dt-smtp-port"
                                    id="smtp-port"
                                    name="smtp-port"
                                    required
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="smtp-username">Usuario SMTP</label>
                            <input
                                    type="text"
                                    class="form-control dt-smtp-username"
                                    id="smtp-username"
                                    name="smtp-username"
                                    required
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="smtp-password">Contraseña SMTP</label>
                            <input
                                    type="text"
                                    class="form-control dt-smtp-password"
                                    id="smtp-password"
                                    name="smtp-password"
                                    required
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="smtp-security">Seguridad SMTP</label>
                            <select class="form-control dt-smtp-security" name="smtp-security" id="smtp-security">
                                <option value="tls">TLS</option>
                                <option value="ssl">SSL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="smtp-timeout">Tiempo de espera SMTP</label>
                            <input
                                    type="text"
                                    class="form-control dt-smtp-timeout"
                                    id="smtp-timeout"
                                    name="smtp-timeout"
                                    maxlength="4"
                            />
                            <small class="form-text text-muted"> Tiempo de espera de SMTP (en segundos) [5 - 10]. </small>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-type">Tipo de correo</label>
                            <select class="form-control dt-email-type" name="email-type" id="email-type">
                                <option value="text">TEXT</option>
                                <option value="html">HTML</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-charset">Charset</label>
                            <select class="form-control dt-email-charset" name="email-charset" id="email-charset">
                                <option value="utf-8">utf-8</option>
                                <option value="iso-8859-1">iso-8859-1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-priority">Prioridad</label>
                            <select class="form-control dt-email-priority" name="email-priority" id="email-priorityt">
                                <option value="1">Alta</option>
                                <option value="2">Normal</option>
                                <option value="3">Baja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="person-name">Nombre del emisor</label>
                            <input
                                    type="text"
                                    class="form-control dt-email-person-name"
                                    id="person-name"
                                    name="person-name"
                                    required
                            />
                            <small class="form-text text-muted"> Nombre que aparecerá en el correo emisor </small>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Correo emisor</label>
                            <input
                                    type="text"
                                    class="form-control dt-email-address"
                                    id="email-address"
                                    name="email-address"
                                    required
                            />
                            <small class="form-text text-muted"> Dirección de correo donde se enviarán los correos </small>
                        </div>
                        <button type="button" class="btn btn-primary data-submit mr-1">Crear</button>
                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--/ Basic table -->
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/tables/admin-email-settings-datatables.js')) }}"></script>
@endsection

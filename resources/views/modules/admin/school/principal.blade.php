@extends('layouts.contentLayoutMaster')

@section('title', 'Administrar escuelas')

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
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>E-mail</th>
                            <th>Admisiones en línea</th>
                            <th>Estatus</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">Registro de escuela</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-fullname">Nombre de la Institución</label>
                            <input
                                    type="text"
                                    class="form-control dt-school-name"
                                    id="basic-icon-default-fullname"
                                    name="school_name"
                                    placeholder="John Doe"
                                    aria-label="John Doe"
                                    required
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-post">Dirección</label>
                            <input
                                    type="text"
                                    id="basic-icon-default-post"
                                    class="form-control dt-address"
                                    name="school_address"
                                    placeholder="Web Developer"
                                    aria-label="Web Developer"
                                    required
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-email">Correo electrónico</label>
                            <input
                                    type="text"
                                    id="basic-icon-default-email"
                                    class="form-control dt-email"
                                    name="school_email"
                                    placeholder="john.doe@example.com"
                                    aria-label="john.doe@example.com"
                                    required
                            />
                            <small class="form-text text-muted"> Correo principal de la institución </small>
                        </div>
                        <div class="form-group mb-4">
                            <label for="selectOnlineAdmission">Admisiones en línea</label>
                            <select class="form-control dt-admission" name="school_admission" id="selectOnlineAdmission">
                                <option selected value="0">NO</option>
                                <option value="1">SI</option>
                            </select>
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
    <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script>
@endsection

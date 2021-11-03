@extends('layouts.contentLayoutMaster')

@section('title', 'Administrar escuelas')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
    <!-- Basic table -->
    {!! Toastr::message() !!}
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">Registro de institución</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-fullname">Nombre de la Institución</label>
                            <input
                                    type="text"
                                    class="form-control dt-school-name"
                                    id="basic-icon-default-fullname"
                                    name="school_name"
                                    placeholder="Benito Juárez"
                                    aria-label="Benito Juárez"
                            />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-post">Dirección</label>
                            <input
                                    type="text"
                                    id="basic-icon-default-post"
                                    class="form-control dt-address"
                                    name="school_address"
                                    placeholder="Paseo de las Ánimas #123"
                                    aria-label="Paseo de las Ánimas #123"
                                    required
                            />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-email">Correo electrónico</label>
                            <input
                                    type="text"
                                    id="basic-icon-default-email"
                                    class="form-control dt-email"
                                    name="school_email"
                                    placeholder="contacto@escuela.com"
                                    aria-label="contacto@escuela.com"
                                    required
                            />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="selectOnlineAdmission">Admisiones en línea</label>
                            <select class="form-control dt-admission" name="school_admission" id="selectOnlineAdmission">
                                <option selected value="0">NO</option>
                                <option value="1">SI</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary data-submit me-1">Crear</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('content._partials._modals.admin.school.show-school-info')
    <!--/ Basic table -->
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/tables/modules/admin/admin-schools-datatables.js')) }}"></script>
@endsection

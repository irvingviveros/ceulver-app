@extends('layouts/contentLayoutMaster')

@section('title', 'Coordinación administrativa')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">

        <div class="row match-height">
            <!-- Timeline Card -->
            <div class="col-lg-4 col-12">
                <div class="card card-user-timeline">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <i data-feather="list" class="user-timeline-title-icon"></i>
                            <h4 class="card-title">Últimos movimientos</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="timeline ms-50">
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <h6>12 Invoices have been paid</h6>
                                    <p>Invoices are paid to the company</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <h6>12 Invoices have been paid</h6>
                                    <p>Invoices are paid to the company</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <h6>12 Invoices have been paid</h6>
                                    <p>Invoices are paid to the company</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <h6>Update project for client</h6>
                                    <p class="mb-0">Update files as per new design</p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <h6>12 Invoices have been paid</h6>
                                    <p>Invoices are paid to the company</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Timeline Card -->

            <!-- App Design Card -->
            <div class="col-lg-8 col-12">
                <div class="card card-user-timeline">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <i data-feather="file-text" class="user-timeline-title-icon"></i>
                            <h4 class="card-title">Generación de reportes</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="badge bg-secondary text-wrap mb-1">Flujo de dinero</div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>Efectivo entrando y saliendo de tu negocio.</p>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-sm btn-primary">Generar reporte</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <div class="badge bg-secondary text-wrap mb-1">Ingresos sin categorizar</div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>Ingresos que no se encuentran bajo ninguna categoría.</p>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-sm btn-primary">Generar reporte</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <div class="badge bg-secondary text-wrap mb-1">Gastos</div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>Efectivo saliendo de tu negocio.</p>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-sm btn-primary">Generar reporte</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ App Design Card -->
        </div>

        <!-- List DataTable -->
        <div class="row">
            <div class="col-12">
                <div class="card invoice-list-wrapper">
                    <div class="card-datatable table-responsive">
                        <table class="invoice-list-table table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th><i data-feather="trending-up"></i></th>
                                <th>Client</th>
                                <th>Total</th>
                                <th class="text-truncate">Issued Date</th>
                                <th>Balance</th>
                                <th>Invoice Status</th>
                                <th class="cell-fit">Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/ List DataTable -->
    </section>
    <!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/app-invoice-list.js')) }}"></script>
@endsection

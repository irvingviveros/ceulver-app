@extends('layouts/contentLayoutMaster')

@section('title', 'Tipo de alumnos')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')
<!-- Hoverable rows start -->
<div class="row" id="table-hover-row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom p-1">
                <div class="head-label"></div>
                <div class="dt-action-buttons text-end">
                    <div class="dt-buttons d-inline-flex">
                        <a href="{{ route('convention.create') }}" class="btn dt-button create-new btn btn-primary" tabindex="0" type="button">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>Crear nuevo registro</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Escuela</th>
                        <th>Tipo</th>
                        <th>Nota</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studentTypes as $studentType)
                    <tr>
                        <td>{{$studentType -> school -> school_name}}</td>
                        <td>{{$studentType -> type}}</td>
                        <td>{{$studentType -> note}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <form action="{{ url('admin/manage-students/convention/'.$studentType->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a class="dropdown-item" href="{{ url('admin/manage-students-convention'.$studentType->id.'/edit') }}">
                                            <i data-feather="edit-2" class="mr-50"></i>
                                            <span>Editar</span>
                                        </a>
                                        <button type="submit" class="dropdown-item" >
                                            <i data-feather="trash" class="mr-50"></i>
                                            <span>Eliminar</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Hoverable rows end -->
@endsection
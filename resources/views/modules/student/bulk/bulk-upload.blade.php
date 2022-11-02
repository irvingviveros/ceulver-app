@extends('layouts.contentLayoutMaster')

@section('title', 'Carga masiva de estudiantes')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <form
                    action="{{route('manage-students.bulk-upload.store')}}"
                    enctype="multipart/form-data"
                    method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4>Carga masiva</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="import_file">Seleccione un archivo</label>
                                        <input
                                            type="file"
                                            id="import_file"
                                            name="import_file"
                                        />
                                        <button type="submit">Importar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

@endsection
@section('page-script')
    {{-- Local JS files --}}
@endsection

@extends('layouts.contentLayoutMaster')

@section('title', 'Carga masiva de recibos')

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
        <div class="row col-md-12 col-xl-12">
            <form
                action="{{route('student-receipts.bulk-upload.store')}}"
                enctype="multipart/form-data"
                method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Upload card start -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Carga masiva de recibos</h4>
                            </div>
                            <div class="card-body">
                                <p>La carga masiva de recibos le permite importar mediante un archivo de
                                    Excel los datos
                                    de los recibos que desea integrar a la plataforma.</p>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="selectSchool">
                                                Seleccione el nivel educativo
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select mb-1" name="selectSchool" id="selectSchool">
                                                @foreach($schools as $school)
                                                    <option value="{{$school->id}}"
                                                            educationalSystem="{{$school->educationalSystem->name}}">{{$school->educationalSystem->name}}</option>
                                                @endforeach
                                            </select>
                                            <label class="col-form-label" for="import_file">
                                                Seleccione el archivo plantilla válido
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input
                                                type="file"
                                                id="import_file"
                                                class="form-control"
                                                name="import_file"
                                            />
                                        </div>
                                        <button type="submit" class="btn btn-primary">Importar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (isset($errors) && $errors->any())
                            <div class="card bg-danger">
                                <div class="card-body">
                                    <p class="card-text text-white">
                                        @foreach($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        @endif
                        @if (session('failures'))
                            <!-- Basic Tables start -->
                            <div class="card bg-danger">
                                <div class="card-body">
                                    <p class="card-text text-white">
                                        Se han detectado valores no permitidos o faltantes en el
                                        archivo. Por favor, corríjalos y vuelva
                                        a subir el archivo.
                                    </p>
                                </div>
                            </div>
                            <div class="row" id="basic-table">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead class="table-dark">
                                                <tr>
                                                    <th>Fila</th>
                                                    <th>Columna</th>
                                                    <th>Errores</th>
                                                    <th>Valor</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(session()->get('failures') as $failure)
                                                    <tr>
                                                        <td>{{ $failure->row() }}</td>
                                                        <td>{{ $failure->attribute() }}</td>
                                                        <td>
                                                            <ul>
                                                                @foreach($failure->errors() as $e)
                                                                    <li>{{ $e }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            {{ $failure->values()[$failure->attribute()] }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Basic Tables end -->
                        @endif
                        @if (session('success'))
                            <div class="card bg-success">
                                <div class="card-body">
                                    <p class="card-text text-white">
                                        {{ session('success') }}
                                    </p>
                                </div>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="card bg-danger">
                                <div class="card-body">
                                    <p class="card-text text-white">
                                        {{ session('error') }}
                                    </p>
                                </div>
                            </div>
                        @endif
                        <!-- Upload card end -->
                    </div>
                    <div class="col-lg-4">
                        <!-- Instruction card start -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <b>Instrucciones</b>
                                </h4>
                                <hr>
                                <ol>
                                    <li>
                                        Verifique el nivel educativo en el que se encuentra.
                                    </li>
                                    <li>
                                        Descargue el archivo plantilla.
                                    </li>
                                    <li>
                                        Abra el archivo descargado e ingrese los datos correspondientes.
                                    </li>
                                    <li>
                                        Guarde los cambios y suba el archivo (formato .xlsx) a la plataforma.
                                    </li>
                                    <li>
                                        El sistema <u>almacenará las filas que no tuvieron errores del archivo.</u>
                                        Verifique los datos incorrectos y vuelva a subir el archivo.
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <b>Valores permitidos</b>
                                </h4>
                                <hr>
                                <ul>
                                    <li>
                                        <b>ID alumno:</b>
                                        <ul>
                                            <li>Obtenga el ID (identificador) del alumno desde la
                                                <a
                                                    href="#"
                                                    target="_blank">
                                                    lista de alumnos
                                                </a>
                                                válidos permitidos.
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <b>Folio:</b>
                                        <ul>
                                            <li>Número de folio consiguiente.</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <b>Concepto:</b>
                                        <ul>
                                            Descripción del recibo de pago.
                                        </ul>
                                    </li>
                                    <li>
                                        <b>Importe:</b>
                                        <ul>
                                            <li>Cantidad pagada.</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <b>Fecha pago:</b>
                                        <ul>
                                            <li>Fecha en formato día, mes y año (DD/MM/AAAA)</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <b>Nota interna:</b>
                                        <ul>
                                            <li>Comentarios que solo serán visibles para el administrador del
                                                módulo de recibos de pago.
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Instruction card end -->
                    </div>
                </div>
            </form>
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
    {!! Toastr::message() !!}
@endsection

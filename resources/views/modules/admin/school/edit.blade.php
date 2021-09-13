@extends('layouts/contentLayoutMaster')

@section('title', 'Editar información de la institución')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">
@endsection

@section('content')
    <!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <form class="form" method="post" action="{{route('manage-schools.update', $school->id)}}" autocomplete="new-text" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Información básica</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="school-code-column">Código de la escuela</label>
                                        <input
                                                type="text"
                                                id="school-code-column"
                                                class="form-control"
                                                name="school-code"
                                                placeholder="Código de la escuela"
                                                value="{{$school -> school_code}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="school-name-column">Nombre de la escuela</label>
                                        <input
                                                type="text"
                                                id="school-name-column"
                                                class="form-control"
                                                name="school-name"
                                                placeholder="Nombre de la escuela"
                                                required
                                                aria-required="true"
                                                value="{{$school -> school_name}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="address-column">Dirección</label>
                                        <input
                                                type="text"
                                                id="address-column"
                                                class="form-control"
                                                name="school-address"
                                                placeholder="Dirección"
                                                required
                                                aria-required="true"
                                                value="{{$school -> address}}"
                                        />

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="school-phone">Teléfono</label>
                                        <input
                                                type="tel"
                                                id="school-phone"
                                                class="form-control"
                                                name="school-phone"
                                                placeholder="Teléfono"
                                                value="{{$school -> phone}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12 mt-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="school-registration">Fecha de registro</label>
                                        <input
                                                type="text"
                                                id="school-registration"
                                                class="form-control flatpickr-human-friendly"
                                                name="school-registration"
                                                required
                                                aria-required="true"
                                                value="{{$school -> created_at}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12 mt-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="email-id-column">Correo electrónico</label>
                                        <input
                                                type="email"
                                                id="email-id-column"
                                                class="form-control"
                                                name="school-email"
                                                placeholder="Correo electrónico"
                                                required
                                                aria-required="true"
                                                value="{{$school -> email}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12 mt-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="footer-column">Pie de página <small class="text-muted">Footer</small></label>
                                        <input
                                                type="text"
                                                id="footer-column"
                                                class="form-control"
                                                name="school-footer"
                                                placeholder="Pie de página"
                                                value="{{$school -> footer}}"
                                        />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="card-header">
                            <h4 class="card-title">Información de configuración</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="school-frotend">Habilitar sitio web</label>
                                        <select class="form-control" id="school-frotend" name="school-frontend">
                                            <option value="0" {{$school -> enable_frontend === 0 ? 'selected' : ''}}>No</option>
                                            <option value="1" {{$school -> enable_frontend === 1 ? 'selected' : ''}}>Si</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="school-admissions">Habilitar admisiones en línea</label>
                                        <select class="form-control" id="school-admissions" name="school-admissions">
                                            <option value="0" {{$school -> enable_online_admission === 0 ? 'selected' : ''}}>No</option>
                                            <option value="1" {{$school -> enable_online_admission === 1 ? 'selected' : ''}}>Si</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="latitude-column">Latitud</label>
                                        <input
                                                type="text"
                                                id="latitude-column"
                                                class="form-control"
                                                placeholder="Latitud"
                                                name="school-latitude"
                                                value="{{$school -> school_lat}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="longitude-column">Longitud</label>
                                        <input
                                                type="text"
                                                id="longitude-column"
                                                class="form-control"
                                                placeholder="Longitud"
                                                name="school-longitude"
                                                value="{{$school -> school_lng}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12 mt-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="country-floating">Maps API Key
                                            <a href="https://developers.google.com/maps/documentation/embed/get-api-key"><small>[Obtener API Key]</small></a>
                                        </label>
                                        <input
                                                type="text"
                                                id="country-floating"
                                                class="form-control"
                                                name="school-maps-api"
                                                placeholder="API Key"
                                                value="{{$school -> map_api_key}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12 mt-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="country-floating">Zoom API Key
                                            <a href="https://devforum.zoom.us/t/finding-your-api-key-secret-credentials-in-marketplace/3471"><small>[Obtener API Key]</small></a>
                                        </label>
                                        <input
                                                type="text"
                                                id="country-floating"
                                                class="form-control"
                                                name="school-zoom-api"
                                                placeholder="Zoom API Key"
                                                value="{{$school -> zoom_api_key}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12 mt-2">
                                    <div class="form-group">
                                        <label class="col-form-label" for="country-floating">Zoom Secret</label>
                                        <input
                                                type="text"
                                                id="country-floating"
                                                class="form-control"
                                                name="school-zoom-secret"
                                                placeholder="Zoom Secret"
                                                value="{{$school -> zoom_secret}}"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="card-header">
                            <h4 class="card-title">Información de redes sociales</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="facebook-column">Facebook</label>
                                        <input
                                                type="text"
                                                id="facebook-column"
                                                class="form-control"
                                                placeholder="URL de Facebook"
                                                name="school-facebook"
                                                value="{{$school -> facebook_url}}"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="card-header">
                            <h4 class="card-title">Otra información</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="customFile">Logo frontal</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="school-logo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="school-enabled">Habilitar escuela</label>
                                        <select class="form-control" id="school-enabled" name="school-status">
                                            <option value="0" {{$school -> status === 0 ? 'selected' : ''}}>No</option>
                                            <option value="1" {{$school -> status === 1 ? 'selected' : ''}}>Si</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="card-body">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary me-1">Actualizar</button>
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection
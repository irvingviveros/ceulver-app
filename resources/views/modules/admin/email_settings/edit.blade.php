@extends('layouts/contentLayoutMaster')

@section('title', 'Editar configuración de correo')

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
                <form class="form" method="post" action="{{url('admin/email-settings/'.$emailSetting->id.'/edit')}}" autocomplete="new-text" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Información básica</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="smtp-host">Host SMTP</label>
                                        <input
                                                type="text"
                                                id="smtp-host"
                                                class="form-control"
                                                name="smtp-host"
                                                placeholder="Host SMTP"
                                                value="{{$emailSetting -> smtp_host}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="smtp-port">Puerto SMTP</label>
                                        <input
                                                type="text"
                                                id="smtp-port"
                                                class="form-control"
                                                name="smtp-port"
                                                placeholder="Puerto SMTP"
                                                value="{{$emailSetting -> smtp_port}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="smtp-timeout">Tiempo de espera</label>
                                        <input
                                                type="text"
                                                id="smtp-timeout"
                                                class="form-control"
                                                name="smtp-timeout"
                                                placeholder="Tiempo de espera"
                                                maxlength="4"
                                                value="{{$emailSetting -> smtp_timeout}}"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="smtp-user">Usuario SMTP</label>
                                        <input
                                                type="text"
                                                id="smtp-user"
                                                class="form-control"
                                                name="smtp-user"
                                                placeholder="Usuario SMTP"
                                                maxlength="4"
                                                value="{{$emailSetting -> smtp_user}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="smtp-password">Contraseña SMTP</label>
                                        <input
                                                type="text"
                                                id="smtp-password"
                                                class="form-control"
                                                name="smtp-password"
                                                placeholder="Contraseña SMTP"
                                                maxlength="4"
                                                value="{{$emailSetting -> smtp_pass}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="smtp-security">Seguridad SMTP</label>
                                        <select class="form-control" id="smtp-security" name="smtp-security">
                                            <option value="tls" {{$emailSetting -> crypto === 'tls' ? 'selected' : ''}}>TLS</option>
                                            <option value="smtp" {{$emailSetting -> crypto === 'smtp' ? 'selected' : ''}}>SMTP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="smtp-type">Tipo de correo</label>
                                        <select class="form-control" id="smtp-type" name="smtp-type">
                                            <option value="text" {{$emailSetting -> mail_type === 'text' ? 'selected' : ''}}>TEXT</option>
                                            <option value="html" {{$emailSetting -> mail_type === 'html' ? 'selected' : ''}}>HTML</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="smtp-charset">Charset</label>
                                        <select class="form-control" id="smtp-charset" name="smtp-charset">
                                            <option value="utf-8" {{$emailSetting -> char_set === 'utf-8' ? 'selected' : ''}}>utf-8</option>
                                            <option value="iso-8859-1" {{$emailSetting -> char_set === 'iso-8859-1' ? 'selected' : ''}}>iso-8859-1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="smtp-priority">Prioridad</label>
                                        <select class="form-control" id="smtp-priority" name="smtp-priority">
                                            <option value="3" {{$emailSetting -> priority === 3 ? 'selected' : ''}}>Baja</option>
                                            <option value="2" {{$emailSetting -> priority === 2 ? 'selected' : ''}}>Normal</option>
                                            <option value="1" {{$emailSetting -> priority === 1 ? 'selected' : ''}}>Alta</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="email-from-name">Nombre del emisor</label>
                                        <input
                                                type="text"
                                                id="email-from-name"
                                                class="form-control"
                                                name="email-from-name"
                                                placeholder="Nombre del emisor"
                                                required
                                                aria-required="true"
                                                value="{{$emailSetting -> from_name}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="email-address">Correo del emisor</label>
                                        <input
                                                type="email"
                                                id="email-address"
                                                class="form-control"
                                                name="email-address"
                                                placeholder="Correo electrónico"
                                                required
                                                aria-required="true"
                                                value="{{$emailSetting -> from_address}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="smtp-charset">Estatus</label>
                                        <select class="form-control" id="smtp-charset" name="email-status">
                                            <option value="1" {{$emailSetting -> status === 1 ? 'selected' : ''}}>Activo</option>
                                            <option value="0" {{$emailSetting -> status === 0 ? 'selected' : ''}}>Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary mr-1">Actualizar</button>
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
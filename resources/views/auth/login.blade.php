@php
    $configData = Helper::applClasses()
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'CEULVER PAE')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <!-- Brand logo-->
            <a class="brand-logo" href="/">
                <img src="{{asset('/images/logo/ceulver_transparent.png')}}" alt="Universidad CEULVER">
            </a>
            <!-- /Brand logo-->
            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                    <img class="img-fluid" src="{{asset('images/background/ceulver_bg.jpg')}}"
                         alt="Universidad CEULVER"/>
                </div>
            </div>
            <!-- /Left Text-->
            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title fw-bold mb-1"><strong>CEULVER PAE</strong></h2>
                    <p class="card-text mb-2">Por favor, inicia sesión con tu credencial de acceso</p>
                    <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
                        @csrf
                        {{--            <div class="mb-1">--}}
                        {{--              <label class="form-label" for="institutionSelect">Instutición</label>--}}
                        {{--              <select class="form-control" id="institutionSelect">--}}
                        {{--                <option>Universidad Veracruz</option>--}}
                        {{--                <option>Universidad Tlaxcala</option>--}}
                        {{--                <option>Secundaria Veracruz</option>--}}
                        {{--              </select>--}}
                        {{--            </div>--}}
                        <div class="mb-1">
                            <label class="form-label" for="login-email">Correo institucional o usuario</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                   id="login-email" name="email" placeholder="IMA2000000" aria-describedby="login-email"
                                   tabindex="1" autofocus value="{{ old('email') }}"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="login-password">NIP</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        <small>¿Olvidaste tu NIP?</small>
                                    </a>
                                @endif
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control form-control-merge" id="login-password"
                                       name="password" tabindex="2"
                                       placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                       aria-describedby="login-password"/>
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100" tabindex="4">Ingresar</button>
                    </form>
                    <div class="divider my-2">
                        <div class="divider-text">o</div>
                    </div>
                    <p class="text-center mt-2">
                        <span>¿Problemas de acceso?</span>
                        <a href="mailto:it@universidadceulver.edu.mx"><span>&nbsp;Contáctanos</span></a>
                    </p>
                </div>
            </div>
            <!-- /Login-->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
    <script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
@endsection

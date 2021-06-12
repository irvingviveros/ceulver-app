@php
  $configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Cambio de NIP')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
  <div class="auth-wrapper auth-v2">
    <div class="auth-inner row m-0">
      <!-- Brand logo-->
      <a class="brand-logo" href="javascript:void(0);">
        <img src="{{asset('/images/logo/ceulver_transparent.png')}}" alt="Universidad CEULVER">
      </a>
      <!-- /Brand logo-->
      <!-- Left Text-->
      <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
          <img class="img-fluid" src="{{asset('images/pages/forgot-password-v2.svg')}}" alt="Restablecer NIP" />
        </div>
      </div>
      <!-- /Left Text-->
      <!-- Forgot password-->
      <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
          <h2 class="card-title font-weight-bold mb-1">¿Olvidaste tu NIP?</h2>
          <p class="card-text mb-2">Ingresa tu correo electrónico personal y te enviaremos instrucciones para restablecer tu NIP.</p>
          <form class="auth-forgot-password-form mt-2" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
              <label for="forgot-password-email" class="form-label">Correo electrónico</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="forgot-password-email" name="email" value="{{ old('email') }}" placeholder="john@example.com" aria-describedby="forgot-password-email" tabindex="1" autofocus />
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <button class="btn btn-primary btn-block" tabindex="2">Restablecer NIP</button>
          </form>
          <p class="text-center mt-2">
            @if (Route::has('login'))
              <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> Regresar a inicio de sesión </a>
            @endif
          </p>
        </div>
      </div>
      <!-- /Forgot password-->
    </div>
  </div>
@endsection

@section('vendor-script')
  <script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
  <script src="{{asset(mix('js/scripts/pages/page-auth-forgot-password.js'))}}"></script>
@endsection

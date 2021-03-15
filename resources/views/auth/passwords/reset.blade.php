@php
  $configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Reset Password')

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
          <img src="{{asset('images/pages/reset-password-v2.svg')}}" class="img-fluid" alt="Restaurar NIP" />
        </div>
      </div>
      <!-- /Left Text-->
      <!-- Reset password-->
      <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
          <h2 class="card-title font-weight-bold mb-1">Restablecer el NIP</h2>
          <p class="card-text mb-2">Su nuevo NIP debe ser diferente de los demás NIP utilizados anteriormente</p>
          <form class="auth-reset-password-form mt-2" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="john@example.com" aria-describedby="email" tabindex="1" autofocus value="{{ $email ?? old('email') }}" />
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <div class="d-flex justify-content-between">
                <label for="reset-password-new">New Password</label>
              </div>
              <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="reset-password-new" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="reset-password-new" tabindex="2" autofocus />
                <div class="input-group-append">
                  <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
              </div>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <div class="d-flex justify-content-between">
                <label for="reset-password-confirm">Confirm Password</label>
              </div>
              <div class="input-group input-group-merge form-password-toggle">
                <input type="password" class="form-control form-control-merge" id="reset-password-confirm" name="password_confirmation" autocomplete="new-password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="reset-password-confirm" tabindex="3" />
                <div class="input-group-append">
                  <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" tabindex="4">Set New Password</button>
          </form>

          <p class="text-center mt-2">
            @if (Route::has('login'))
              <a href="{{ route('login') }}">
                <i data-feather="chevron-left"></i> Back to login
              </a>
            @endif
          </p>
        </div>
      </div>
      <!-- /Reset password-->
    </div>
  </div>
@endsection

@section('vendor-script')
  <script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
  <script src="{{asset(mix('js/scripts/pages/page-auth-reset-password.js'))}}"></script>
@endsection

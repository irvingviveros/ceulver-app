@extends('layouts.fullLayoutMaster')

@section('title', 'Página no encontrada')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-misc.css')) }}">
@endsection

@section('content')
    <!-- Error page-->
    <div class="misc-wrapper">
        <div class="misc-inner p-2 p-sm-3">
            <div class="w-100 text-center">
                <h1>404</h1>
                <h2 class="mb-1">Página no encontrada</h2>
                <p class="mb-2">
                    La página solicitada no se encuentra o está temporalmente fuera de servicio. <br>
                    Si cree que es un error del servidor, por favor contacte al administrador.
                </p>
                <a class="btn btn-primary mb-2 btn-sm-block" href="{{url('/')}}">Regresar a inicio</a>
            </div>
        </div>
    </div>
    <!-- / Error page-->
@endsection

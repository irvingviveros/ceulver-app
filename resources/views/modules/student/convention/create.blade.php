@extends('layouts/contentLayoutMaster')

@section('title', 'Nuevo tipo de alumno')

@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Crear registro</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" method="post" action="{{ route('convention.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicSelect">Selecciona la escuela</label>
                                        <select class="form-control" id="basicSelect" name="school-id">
                                            @foreach($schools as $school)
                                            <option value="{{$school -> id}}">{{$school -> school_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="student-type">Tipo de alumno</label>
                                        <input
                                                type="text"
                                                id="student-type"
                                                class="form-control"
                                                name="student-type"
                                                placeholder="Tipo de alumno"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="student-type-note">Notas</label>
                                        <textarea class="form-control" name="student-type-note" id="student-type-note" rows="3" placeholder="Notas"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Crear</button>
                                    <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-secondary">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Vertical form layout section end -->
@endsection
@extends('layouts/contentLayoutMaster')

@section('title', 'Editar tipo de alumno')

@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editar registro</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" method="post" action="{{url('admin/manage-students/type/'.$studentType->id.'/edit')}}" autocomplete="new-text" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="student-type">Tipo de alumno</label>
                                        <input
                                                type="text"
                                                id="student-type"
                                                class="form-control"
                                                name="student-type"
                                                placeholder="Tipo de alumno"
                                                value="{{$studentType -> type}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="student-type-note">Notas</label>
                                        <textarea class="form-control" name="student-type-note" id="student-type-note" rows="3" placeholder="Notas" data-value="{{$studentType -> note}}"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Actualizar</button>
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
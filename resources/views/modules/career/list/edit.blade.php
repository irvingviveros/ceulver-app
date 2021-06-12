@extends('layouts/contentLayoutMaster')

@section('title', 'Edición de materia')

@section('content')
    <!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Carrera <b>{{ $career->name }}</b></h4>
                    </div>
                    <div class="card-body">
                        <form class="form">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="career_name">Nombre de carrera</label>
                                        <input
                                                type="text"
                                                id="career_name"
                                                class="form-control"
                                                placeholder="Nombre de carrera"
                                                name="career_name"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="career_enrollment">Matrícula</label>
                                        <input
                                                type="text"
                                                id="career_enrollment"
                                                class="form-control"
                                                placeholder="Matrícula"
                                                name="career_enrollment"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">City</label>
                                        <input type="text" id="city-column" class="form-control" placeholder="City" name="city-column" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Country</label>
                                        <input
                                                type="text"
                                                id="country-floating"
                                                class="form-control"
                                                name="country-floating"
                                                placeholder="Country"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Company</label>
                                        <input
                                                type="text"
                                                id="company-column"
                                                class="form-control"
                                                name="company-column"
                                                placeholder="Company"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Email</label>
                                        <input
                                                type="email"
                                                id="email-id-column"
                                                class="form-control"
                                                name="email-id-column"
                                                placeholder="Email"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="reset" class="btn btn-primary mr-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Floating Label Form section end -->
@endsection
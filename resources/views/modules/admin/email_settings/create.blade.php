@extends('layouts/contentLayoutMaster')

@section('title', 'Configuración de correo')
@section('content')
    <div>
        <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Vertical Form</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-vertical">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">First Name</label>
                                            <input
                                                    type="text"
                                                    id="first-name-vertical"
                                                    class="form-control"
                                                    name="fname"
                                                    placeholder="First Name"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email-id-vertical">Email</label>
                                            <input type="email" id="email-id-vertical" class="form-control" name="email-id" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Mobile</label>
                                            <input
                                                    type="number"
                                                    id="contact-info-vertical"
                                                    class="form-control"
                                                    name="contact"
                                                    placeholder="Mobile"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password-vertical">Password</label>
                                            <input
                                                    type="password"
                                                    id="password-vertical"
                                                    class="form-control"
                                                    name="contact"
                                                    placeholder="Password"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3" />
                                                <label class="custom-control-label" for="customCheck3">Remember me</label>
                                            </div>
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
        <!-- Basic Vertical form layout section end -->
    </div>
@endsection
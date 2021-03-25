@extends('layouts/contentLayoutMaster')

@section('title', 'Editar escuela')

@section('content')
    <!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <form class="form">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Información básica</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">First Name</label>
                                        <input
                                                type="text"
                                                id="first-name-column"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="fname-column"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Last Name</label>
                                        <input
                                                type="text"
                                                id="last-name-column"
                                                class="form-control"
                                                placeholder="Last Name"
                                                name="lname-column"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="city-column">City</label>
                                        <input type="text" id="city-column" class="form-control" placeholder="City" name="city-column" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
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
                                <div class="col-md-6 col-lg-3 col-12">
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
                                <div class="col-md-6 col-lg-3 col-12">
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
                                        <label for="first-name-column">First Name</label>
                                        <input
                                                type="text"
                                                id="first-name-column"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="fname-column"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Last Name</label>
                                        <input
                                                type="text"
                                                id="last-name-column"
                                                class="form-control"
                                                placeholder="Last Name"
                                                name="lname-column"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="city-column">City</label>
                                        <input type="text" id="city-column" class="form-control" placeholder="City" name="city-column" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
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
                                <div class="col-md-6 col-lg-3 col-12">
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
                                <div class="col-md-6 col-lg-3 col-12">
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
                                        <label for="first-name-column">First Name</label>
                                        <input
                                                type="text"
                                                id="first-name-column"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="fname-column"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Last Name</label>
                                        <input
                                                type="text"
                                                id="last-name-column"
                                                class="form-control"
                                                placeholder="Last Name"
                                                name="lname-column"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
                                    <div class="form-group">
                                        <label for="city-column">City</label>
                                        <input type="text" id="city-column" class="form-control" placeholder="City" name="city-column" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-12">
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
                                <div class="col-md-6 col-lg-3 col-12">
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
                                <div class="col-md-6 col-lg-3 col-12">
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
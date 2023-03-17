<section class="app-user-view-account">
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img
                                class="img-fluid rounded mt-3 mb-2"
                                src="{{asset('images/profile/user-uploads/avatar.png')}}"
                                height="110"
                                width="110"
                                alt="User avatar"
                            />
                            <div class="user-info text-center">
                                <h4 class="text-uppercase">
                                    {{$student->paternal_surname}}
                                    {{$student->maternal_surname}}
                                    {{$student->first_name}}
                                </h4>
                                <span class="badge bg-light-secondary">{{$student->enrollment}}</span>
                            </div>
                        </div>
                    </div>
                    <h4 class="fw-bolder border-bottom pb-50 mb-1 pt-75">Resumen</h4>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Institución:</span>
                                <span>{{$school->school_name}}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Nivel educativo:</span>
                                <span>{{$school->educationalSystem->name}}</span>
                            </li>
                            @if($school->educationalSystem->name === 'Universidad')
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Carrera:</span>
                                    <span>{{$student->career->name}}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Usuario:</span>
                                    <span></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Correo electrónico:</span>
                                    <span>{{$student->personal_email}}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Teléfono:</span>
                                    <span>{{$student->personal_phone}}</span>
                                </li>
                            @endif
                            <li class="mb-75">
                                <span class="fw-bolder me-25">Estatus:</span>
                                @if ($student->status === 0)
                                    <span class="badge bg-light-danger">Inactivo</span>
                                @else
                                    <span class="badge bg-light-success">Activo</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
        </div>
        <!--/ User Sidebar -->

        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- User Pills -->
            <ul class="nav nav-pills mb-2">
                <li class="nav-item">
                    <a class="nav-link active" href="{{asset('app/user/view/account')}}">
                        <i data-feather="user" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Datos personales</span></a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i data-feather="lock" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Cuenta</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Financiero</span>
                    </a>
                </li>
            </ul>
            <!--/ User Pills -->

            <!-- Student details -->
            <div class="card">
                <h4 class="card-header">Información personal</h4>
                <div class="card-body container">
                    <div class="row">
                        <div class="col-3">
                            <label class="form-label" for="paternalSurname">Apellido paterno</label>
                            <p id="paternalSurname">{{$student->paternal_surname}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="maternalSurname">Apellido materno</label>
                            <p id="maternalSurname">{{$student->maternal_surname}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="firstName">Nombre(s)</label>
                            <p id="firstName">{{$student->first_name}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="birthday">Fecha de nacimiento</label>
                            <p id="firstName">{{$student->birth_date}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label class="form-label" for="nationalId">CURP</label>
                            <p id="nationalId">{{$student->national_id}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="nationalId">Nacionalidad</label>
                            <p id="nationalId">{{$student->nationality}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="address">Dirección</label>
                            <p id="address">{{$student->address}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="sex">Sexo</label>
                            <p id="sex">{{$student->sex}}</p>
                        </div>
                        @if($school->educationalSystem->name === 'Universidad')
                            <div class="col-3">
                                <label class="form-label" for="occupation">Ocupación</label>
                                <p id="occupation">{{$student->occupation}}</p>
                            </div>
                            <div class="col-3">
                                <label class="form-label" for="maritalStatus">Estado civil</label>
                                <p id="maritalStatus">{{$student->marital_status}}</p>
                            </div>
                            <div class="col-3">
                                <label class="form-label" for="personalEmail">Email personal</label>
                                <p id="personalEmail">{{$student->personal_email}}</p>
                            </div>
                            <div class="col-3">
                                <label class="form-label" for="personalPhone">Teléfono personal</label>
                                <p id="personalPhone">{{$student->personal_phone}}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /Student details -->

            <!-- Student academic data -->
            <div class="card">
                <h4 class="card-header">Información académica</h4>
                <div class="card-body">
                    <div class="row">
                        @if($school->educationalSystem->name === 'Universidad')
                            <div class="col-3">
                                <label class="form-label" for="career">Carrera</label>
                                <p id="career">{{$student->career->name}}</p>
                            </div>
                            <div class="col-3">
                                <label class="form-label" for="enrollment">Matrícula</label>
                                <p id="enrollment">{{$student->enrollment}}</p>
                            </div>
                        @endif
                        <div class="col-3">
                            <label class="form-label" for="paymentReference">Referencia de pago</label>
                            <p id="paymentReference">{{$student->payment_reference}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="discount">Descuento (beca)</label>
                            <p id="discount"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Student academic data -->

            <!-- Student health details -->
            <div class="card">
                <h4 class="card-header">Salud</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <label class="form-label" for="bloodGroup">Grupo sanguíneo</label>
                            <p id="bloodGroup">{{$student->blood_group}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="ailments">Padecimientos</label>
                            <p id="bloodGroup">{{$student->ailments}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="allergies">Alergias</label>
                            <p id="allergies">{{$student->allergies}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Student health details -->

            <!-- Reference data -->
            <div class="card">
                @if($school->educationalSystem->name === 'Universidad')
                    <h4 class="card-header">Contacto de referencia</h4>
                @else
                    <h4 class="card-header">Padre o tutor</h4>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <label class="form-label" for="guardianLastName">Apellidos</label>
                            <p id="guardianLastName">{{$guardian->name ?? ''}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="guardianName">Apellidos</label>
                            <p id="guardianName">{{$guardian->last_name  ?? ''}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="guardianRelationship">Parentesco</label>
                            <p id="guardianRelationship">{{$student->guardian_relationship  ?? ''}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="guardianAddress">Dirección</label>
                            <p id="guardianAddress">{{$guardian->address  ?? ''}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="guardianEmail">Email</label>
                            <p id="guardianEmail">{{$guardian->email  ?? ''}}</p>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="guardianPhone">Teléfono personal</label>
                            <p id="guardianPhone">{{$guardian->phone  ?? ''}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Reference data -->
        </div>
        <!--/ User Content -->
    </div>
</section>

{{-- Page scripts --}}
{!! Toastr::message() !!}
<script>feather.replace() //Icons</script>

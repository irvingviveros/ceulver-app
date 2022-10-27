<form class="add-new-record row gy-2 gx-2" id="registerForm">

    <div class="border d-flex align-items-center bg-light" style="height: 35px;">
        <b>Seleccionar institución</b>
    </div>

    <div class="col-6">
        <div class="col-md-6 basic-select2">
            <label class="form-label" for="schoolSelect">Institución - Plantel</label>
            <select class="form-select" name="schoolSelect" id="schoolSelect">
                <option selected disabled>Seleccionar</option>
                @foreach($schools as $school)
                    <option value="{{$school->id}}"
                            educationalSystem="{{$school->educationalSystem->name}}">{{$school->school_name}}
                        - {{$school->educationalSystem->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="border d-flex align-items-center bg-light" style="height: 35px;">
        <b>Información personal</b>
    </div>

    <div class="col-3">
        <label class="form-label" for="paternalSurname">Apellido paterno
            <span class="text-danger">*</span>
        </label>
        <input
            type="text"
            class="form-control"
            id="paternalSurname"
            name="paternalSurname"
            placeholder="Apellido paterno"
            aria-label="Apellido paterno"
        />
        <span for="paternalSurname" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="maternalSurname">Apellido materno
            <span class="text-danger">*</span>
        </label>
        <input
            type="text"
            class="form-control"
            id="maternalSurname"
            name="maternalSurname"
            placeholder="Apellido materno"
            aria-label="Apellido materno"
        />
        <span for="maternalSurname" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="firstName">Nombre(s)
            <span class="text-danger">*</span>
        </label>
        <input
            type="text"
            class="form-control"
            id="firstName"
            name="firstName"
            placeholder="Nombre(s)"
            aria-label="Nombre o nombres"
        />
        <span for="firstName" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="birthday">Fecha de nacimiento
            <span class="text-danger">*</span>
        </label>
        <br>
        <input
            type="text"
            id="birthday"
            name="birthday"
            class="form-control flatpickr-basic"
            placeholder="Seleccionar"
            readonly>
    </div>


    <div class="col-3">
        <label class="form-label" for="nationalId">CURP
            <span class="text-danger">*</span>
        </label>
        <input
            type="text"
            class="form-control"
            id="nationalId"
            name="nationalId"
            placeholder="CURP"
            aria-label="CURP"
            onkeydown="return event.code === 'Space' ? event.preventDefault() : ''"
        />
        <span for="nationalId" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="address">Domicilio
            <span class="text-danger">*</span>
        </label>
        <input
            type="text"
            class="form-control"
            id="address"
            name="address"
            placeholder="Domicilio"
            aria-label="Domicilio"
        />
        <span for="address" class="text-danger"></span>
    </div>

    <div class="col-3 d-none" dynamic-toggle>
        <label class="form-label" for="occupation">Ocupación
            <span class="text-danger">*</span>
        </label>
        <input
            type="text"
            class="form-control"
            id="occupation"
            name="occupation"
            maxlength="13"
            placeholder="Ocupación"
            aria-label="Ocupación"
        />
        <span for="occupation" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="sexSelect">Sexo
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" id="sexSelect" name="sexSelect">
            <option selected value="" disabled>Seleccionar</option>
            <option>Masculino</option>
            <option>Femenino</option>
        </select>
        <span for="sexSelect" class="text-danger"></span>
    </div>

    <div class="col-3 d-none" dynamic-toggle>
        <label class="form-label" for="maritalStatus">Estado civil
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" id="maritalStatus" name="maritalStatus">
            <option selected value="" disabled>Seleccionar</option>
            <option>Soltero(a)</option>
            <option>Casado(a)</option>
            <option>Divorciado(a)</option>
            <option>Viudo(a)</option>
        </select>
        <span for="maritalStatus" class="text-danger"></span>
    </div>

    <div class="col-3 d-none" dynamic-toggle data-system="Universidad">
        <label class="form-label" for="email">Correo electrónico personal
            <span class="text-danger">*</span>
        </label>
        <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="Correo electrónico personal"
            aria-label="Correo electrónico personal"
        />
        <span for="email" class="text-danger"></span>
    </div>

    <div class="col-3 d-none" dynamic-toggle data-system="Universidad">
        <label class="form-label" for="phone">Número telefónico personal (celular)
            <span class="text-danger">*</span>
        </label>
        <input
            type="tel"
            class="form-control"
            id="phone"
            name="phone"
            placeholder="Teléfono a 10 dígitos"
            aria-label="Número telefónico (celular)"
            maxlength="12"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
        />
        <span for="phone" class="text-danger"></span>
    </div>

    <div class="col-6"></div>

    <div class="border d-flex align-items-center bg-light" style="height: 35px;">
        <b>Información personal - Salud</b>
    </div>

    <div class="col-3">
        <label class="form-label" for="bloodGroup">Grupo sanguíneo
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" id="bloodGroup" name="bloodGroup">
            <option selected value="" disabled>Seleccionar</option>
            <option>A+</option>
            <option>A-</option>
            <option>A desconocido</option>
            <option>B+</option>
            <option>B-</option>
            <option>B desconocido</option>
            <option>AB+</option>
            <option>AB-</option>
            <option>AB desconocido</option>
            <option>O+</option>
            <option>O-</option>
            <option>O desconocido</option>
            <option>Desconocido</option>
        </select>
        <span for="bloodGroup" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="ailments">Padecimientos conocidos</label>
        <input
            type="text"
            class="form-control"
            id="ailments"
            name="ailments"
            placeholder="Padecimientos conocidos"
            aria-label="Padecimientos conocidos"
        />
        <span for="address" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="allergies">Alergias</label>
        <input
            type="text"
            class="form-control"
            id="allergies"
            name="allergies"
            placeholder="Alergias"
            aria-label="Alergias"
        />
        <span for="address" class="text-danger"></span>
    </div>

    <div class="border d-flex align-items-center bg-light" style="height: 35px;">
        <b>Información académica</b>
    </div>

    <div class="container d-none" dynamic-toggle data-system="Universidad">
        <div class="row">
            <div class="col-3">
                <div class="basic-select2">
                    <label class="form-label" for="careerSelect">Carrera a cursar
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-select" id="careerSelect" name="careerSelect">
                        <option selected value="" disabled>Seleccionar</option>
                        @foreach($careers as $career)
                            <option value="{{$career->id}}" enrollment="{{$career->enrollment}}">{{$career->name}}</option>
                        @endforeach
                    </select>
                </div>
                <span for="schoolSelect" class="text-danger"></span>
            </div>

            <div class="col-3">
                <label class="form-label" for="enrollment">Matrícula
                    <span class="text-danger">*</span>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id="enrollment"
                    name="enrollment"
                    placeholder="Matrícula"
                    aria-label="Matrícula"
                />
                <span for="address" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="col-3">
        <label class="form-label" for="paymentReference">Referencia de pago <i> - Opcional</i></label>
        <span data-bs-toggle="popover"
              data-bs-content="Dato opcional. Si no cuenta con una, puede introducirla después del registro del alumno."
              data-bs-trigger="hover"
              title data-bs-original-title="Referencia de pago">
            <i type="button" data-feather='info'></i>
        </span>
        <input
            type="text"
            class="form-control"
            id="paymentReference"
            name="paymentReference"
            placeholder="Número de referencia"
            aria-label="Referencia de pago"
        />
        <span for="address" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="scholarship">Descuento (beca)<i> - Opcional</i></label>
        <span data-bs-toggle="popover"
              data-bs-content="Puede asignar una beca o descuento en este momento o en otro momento."
              data-bs-trigger="hover"
              title data-bs-original-title="Descuento (beca)">
            <i type="button" data-feather='info'></i>
        </span>
        <select class="form-select" id="scholarship">
            <option selected value="" disabled>Seleccionar</option>
            <option value="0">Beca inicial</option>
            <option value="1">Beca 50% descuento</option>
        </select>
        <span for="scholarship" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="studentStatus">Estatus del alumno</label>
        <span data-bs-toggle="popover"
              data-bs-content="Permite el ingreso del alumno a su cuenta y a la plataforma. Si se desactiva, no podrá ingresar a la plataforma."
              data-bs-trigger="hover"
              title data-bs-original-title="Estatus del alumno">
            <i type="button" data-feather='info'></i>
        </span>
        <select class="form-select" id="studentStatus">
            <option value="0">Inactivo</option>
            <option value="1" selected>Activo</option>
        </select>
        <span for="studentStatus" class="text-danger"></span>
    </div>

    <div class="border d-flex align-items-center bg-light" style="height: 35px;">
        <b>Datos del padre o tutor</b>
    </div>

    <div class="col-3">
        <label class="form-label" for="guardianLastName">Apellido(s)
            <span class="text-danger">*</span>
        </label>
        <input
            type="text"
            class="form-control"
            id="guardianLastName"
            name="guardianLastName"
            placeholder="Apellido(s)"
            aria-label="Apellido o apellidos"
        />
        <span for="guardianLastName" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="guardianFirstName">Nombre(s)
            <span class="text-danger">*</span>
        </label>
        <input
            type="text"
            class="form-control"
            id="guardianFirstName"
            name="guardianFirstName"
            maxlength="50"
            placeholder="Nombre del padre o tutor"
            aria-label="Nombre del padre o tutor"
        />
        <span for="guardianFirstName" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="guardianRelationship">Parentesco
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" id="guardianRelationship" name="guardianRelationship">
            <option selected value="" disabled>Seleccionar</option>
            <option>Madre</option>
            <option>Padre</option>
            <option>Hermano(a)</option>
            <option>Abuelo(a)</option>
            <option>Tío(a)</option>
            <option>Amistad de la familia</option>
            <option>Cuidador(a) social</option>
            <option>Otro</option>
        </select>
        <span for="guardianRelationship" class="text-danger"></span>
    </div>

    <div class="col-3"></div>

    <div class="col-3">
        <label class="form-label" for="guardianAddress">Domicilio
            <span class="text-danger">*</span>
        </label>
        <input
            type="text"
            class="form-control"
            id="guardianAddress"
            name="guardianAddress"
            placeholder="Domicilio"
            aria-label="Domicilio"
        />
        <span for="guardianAddress" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="guardianEmail">Correo electrónico personal</label>
        <input
            type="email"
            class="form-control"
            id="guardianEmail"
            name="guardianEmail"
            placeholder="Correo electrónico personal"
            aria-label="Correo electrónico personal"
        />
        <span for="guardianEmail" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="guardianPhone">Número telefónico personal</label>
        <input
            type="tel"
            class="form-control"
            id="guardianPhone"
            name="guardianPhone"
            placeholder="Número telefónico (celular)"
            aria-label="Número telefónico (celular)"
            maxlength="10"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
        />
        <span for="guardianPhone" class="text-danger"></span>
    </div>

    <div class="col-3"></div>

    <div class="border d-flex align-items-center bg-light hide-toggle" style="height: 35px;">
        <b>Padre o tutor - Acceso a la plataforma</b>
    </div>

    <div class="col-3 hide-toggle">
        <label class="form-label" for="guardianUsername">Usuario
            <span class="text-danger">*</span>
        </label>
        <span data-bs-toggle="popover"
              data-bs-content="Con el usuario, el padre/tutor podrá acceder al módulo de recibos de pago del estudiante destinado."
              data-bs-trigger="hover"
              title data-bs-original-title="Usuario del padre/tutor">
            <i type="button" data-feather='info'></i>
        </span>
        <input
            class="form-control"
            id="guardianUsername"
            name="guardianUsername"
            placeholder="Nombre de usuario"
            aria-label="Nombre de usuario del padre o tutor"
            onkeydown="return event.code === 'Space' ? event.preventDefault() : ''"
        />
        <span for="guardianUsername" class="text-danger"></span>
    </div>
    <div class="col-3 hide-toggle">
        <label class="form-label" for="guardianPassword">Contraseña
            <span class="text-danger">*</span>
        </label>
        <span data-bs-toggle="popover"
              data-bs-content="Genere una contraseña o introduzca una manualmente."
              data-bs-trigger="hover"
              title data-bs-original-title="Creación de contraseña">
            <i type="button" data-feather='info'></i>
        </span>
        <div class="input-group form-password-toggle input-group-merge">
            <input
                type="password"
                class="form-control generated-password"
                id="guardianPassword"
                name="guardianPassword"
                placeholder="Contraseña"
                data-msg="Generar contraseña"
                onkeydown="return event.code === 'Space' ? event.preventDefault() : ''"
            />
            <div class="input-group-text cursor-pointer">
                <i data-feather="eye"></i>
            </div>
            <button class="btn btn-outline-primary" id="guardianGeneratePwd" type="button">Generar contraseña</button>
        </div>
    </div>

    <div class="border d-flex align-items-center bg-light d-none" dynamic-toggle data-system="Universidad" style="height: 35px;">
        <b>Alumno - Acceso a la plataforma</b>
    </div>

    <div class="col-3 d-none" dynamic-toggle data-system="Universidad">
        <label class="form-label" for="studentUsername">Usuario del alumno
            <span class="text-danger">*</span>
        </label>
        <span data-bs-toggle="popover"
              data-bs-content="El usuario se genera automáticamente con el dato de la CURP del estudiante."
              data-bs-trigger="hover"
              title data-bs-original-title="Generar usuario">
            <i type="button" data-feather='info'></i>
        </span>
        <input
            class="form-control"
            id="studentUsername"
            name="studentUsername"
            placeholder="Nombre de usuario"
            aria-label="Nombre de usuario"
            onkeydown="return event.code === 'Space' ? event.preventDefault() : ''"
        />
        <span for="studentUsername" class="text-danger"></span>
    </div>
    <div class="col-3 d-none" dynamic-toggle data-system="Universidad">
        <label class="form-label" for="studentPassword">Contraseña
            <span class="text-danger">*</span>
        </label>
        <span data-bs-toggle="popover"
              data-bs-content="Genere una contraseña o introduzca una manualmente."
              data-bs-trigger="hover"
              title data-bs-original-title="Creación de contraseña">
            <i type="button" data-feather='info'></i>
        </span>
        <div class="input-group form-password-toggle input-group-merge">
            <input
                type="password"
                class="form-control"
                id="studentPassword"
                name="studentPassword"
                placeholder="Contraseña"
                data-msg="Generar contraseña"
                onkeydown="return event.code === 'Space' ? event.preventDefault() : ''"
            />
            <div class="input-group-text cursor-pointer">
                <i data-feather="eye"></i>
            </div>
            <button class="btn btn-outline-primary" id="studentGeneratePwd" type="button">Generar contraseña</button>
        </div>
    </div>

    <input type="hidden" name="studentId" id="studentId" value="@isset($student){{ $student->id }}@endisset"/>
</form>

{{-- Page scripts --}}
<script src="{{ asset(mix('vendors/js/feather-icons/feather-icons.min.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/pickers/customPickr.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/components/components-popovers.js'))}}"></script>
<script src="{{ asset(mix('js/utils/input-uppercase.js')) }}"></script>
<script src="{{ asset(mix('js/utils/toggle-selector-input.js'))}}"></script>
<script src="{{ asset(mix('js/utils/enrollment-generator.js'))}}"></script>
<script src="{{ asset(mix('js/utils/student-username-generator.js'))}}"></script>
<script src="{{ asset(mix('js/utils/password-toggle.js'))}}"></script>
<script src="{{ asset(mix('js/utils/random-password-generator.js'))}}"></script>
<script>feather.replace() //Icons</script>

{{-- Convert the input characters from lower to uppercase --}}
<script>
    document.getElementById("nationalId").addEventListener("keypress", toUpperCase, false);
</script>

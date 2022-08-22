<form class="add-new-record row gy-2 gx-2" id="studentRegisterForm">

    <div class="border d-flex align-items-center bg-light" style="height: 35px;">
        <b>Seleccionar institución</b>
    </div>

    <div class="col-3">
        <label class="form-label" for="schoolSelect">Nombre de la institución
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" id="schoolSelect">
            @foreach($schools as $school)
                <option value="{{$school->id}}">{{$school->school_name}}</option>
            @endforeach
        </select>
        <span for="schoolSelect" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="educationalSystems">Nivel educativo
            <span class="text-danger">*</span>
        </label>
        <select class="form-select" id="educationalSystems"
                onchange="toggleSelectorInput(this.value, '6', '#university')">
            @foreach($schools as $school)
                @foreach($school->educationalSystems as $educationalSystem)
                    <option value="{{$educationalSystem->id}}">{{$educationalSystem->name}}</option>
                @endforeach
            @endforeach
        </select>
        <span for="educationalSystems" class="text-danger"></span>
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
            maxlength="50"
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
            maxlength="50"
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
            maxlength="50"
            placeholder="Nombre(s)"
            aria-label="Nombre o nombres"
        />
        <span for="firstName" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="fp-default">Fecha de nacimiento
            <span class="text-danger">*</span>
        </label>
        <br>
        <input type="text" id="fp-default" class="form-control flatpickr-basic"
               placeholder="Seleccionar" readonly>
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
            maxlength="18"
            placeholder="CURP"
            aria-label="CURP"
        />
        <span for="nationalId" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="address">Domicilio</label>
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

    <div class="col-3">
        <label class="form-label" for="occupation">Ocupación</label>
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
        <label class="form-label" for="sexSelect">Sexo</label>
        <select class="form-select" id="sexSelect">
            <option selected value="">Seleccionar</option>
            <option>Masculino</option>
            <option>Femenino</option>
        </select>
        <span for="sexSelect" class="text-danger"></span>
    </div>

    <div class="col-3">
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

    <div class="col-3">
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
        <label class="form-label" for="bloodGroup">Grupo sanguíneo</label>
        <select class="form-select" id="bloodGroup">
            <option selected value="">Seleccionar</option>
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

    <div class="col-3" id="university" style="display: none">
        <div class="col-md-12 basic-select2">
            <label class="form-label" for="careerSelect">Carrera a cursar
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" id="careerSelect">
                @foreach($careers as $career)
                    <option value="{{$career->id}}">{{$career->name}}</option>
                @endforeach
            </select>
        </div>
        <span for="schoolSelect" class="text-danger"></span>
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
            maxlength="50"
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
        <label class="form-label" for="guardianRelationship">Parentesco</label>
        <input
            type="text"
            class="form-control"
            id="guardianRelationship"
            name="guardianRelationship"
            maxlength="50"
            placeholder="Parentesco"
            aria-label="Parentesco con el padre o tutor"
        />
        <span for="guardianRelationship" class="text-danger"></span>
    </div>

    <div class="col-3"></div>

    <div class="col-3">
        <label class="form-label" for="guardianAddress">Domicilio</label>
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

    <input type="hidden" name="studentId" id="studentId" value="@isset($student){{ $student->id }}@endisset"/>
</form>

{{-- Page scripts --}}
<script src="{{ asset(mix('js/scripts/forms/pickers/customPickr.js')) }}"></script>
<script src="{{ asset(mix('js/utils/input-uppercase.js')) }}"></script>
<script src="{{asset(mix('js/utils/toggle-selector-input.js'))}}"></script>

{{-- Event listeners --}}
<script>
    document.getElementById("nationalId").addEventListener("keypress", toUpperCase, false);
</script>

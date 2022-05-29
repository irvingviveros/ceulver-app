<form class="add-new-record row gy-2 gx-2" id="teacherRegisterForm">

    <div class="border d-flex align-items-center bg-light" style="height: 35px;">
        <b>Seleccionar institución</b>
    </div>

    <div class="col-6">
        <div class="col-md-6 basic-select2">
            <label class="form-label" for="schoolSelect">Nombre de la institución</label>
            <select class="form-select" id="schoolSelect">
                @foreach($schools as $school)
                    <option value="{{$school->id}}">{{$school->school_name}}</option>
                @endforeach
            </select>
        </div>
        <span for="schoolSelect" class="text-danger"></span>
    </div>

    <div class="col-6"></div>

    <div class="border d-flex align-items-center bg-light" style="height: 35px;">
        <b>Información personal</b>
    </div>

    <div class="col-3">
        <label class="form-label" for="firstName">Primer nombre<span class="text-danger">*</span></label>
        <input
                type="text"
                class="form-control"
                id="firstName"
                name="firstName"
                maxlength="50"
                placeholder="Primer nombre"
                aria-label="Primer nombre"
        />
        <span for="firstName" class="text-danger"></span>
    </div>


    <div class="col-3">
        <label class="form-label" for="middleName">Segundo nombre</label>
        <input
                type="text"
                class="form-control"
                id="middleName"
                name="middleName"
                maxlength="50"
                placeholder="Segundo nombre (opcional)"
                aria-label="Segundo nombre"
        />
        <span for="middleName" class="text-danger"></span>
    </div>


    <div class="col-3">
        <label class="form-label" for="paternalSurname">Apellido paterno<span class="text-danger">*</span></label>
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
        <label class="form-label" for="maternalSurname">Apellido materno<span class="text-danger">*</span></label>
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
        <label class="form-label" for="nationalId">CURP<span class="text-danger">*</span></label>
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
        <label class="form-label" for="rfc">RFC<span class="text-danger">*</span></label>
        <input
                type="text"
                class="form-control"
                id="rfc"
                name="rfc"
                maxlength="13"
                placeholder="RFC"
                aria-label="rfc"
        />
        <span for="rfc" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="email">Correo electrónico personal</label>
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
        <label class="form-label" for="phone">Número telefónico</label>
        <input
                type="tel"
                class="form-control"
                id="phone"
                name="phone"
                placeholder="Número telefónico"
                aria-label="Número telefónico"
        />
        <span for="phone" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="address">Dirección</label>
        <input
                type="text"
                class="form-control"
                id="address"
                name="address"
                placeholder="Dirección"
                aria-label="Dirección"
        />
        <span for="address" class="text-danger"></span>
    </div>

    <div class="col-md-3">
        <label class="form-label" for="pickrBirthday">Fecha de cumpleaños</label>
        <input
                type="text"
                id="pickrBirthday"
                class="form-control flatpickrDefault"
                placeholder="Seleccionar"
        />
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

    <div class="border d-flex align-items-center bg-light" style="height: 35px;">
        <b>Información académica</b>
    </div>

    <div class="col-3">
        <label class="form-label" for="academicEmail">Correo electrónico institucional<span class="text-danger">*</span></label>
        <input
                type="email"
                class="form-control"
                id="academicEmail"
                name="academicEmail"
                placeholder="Correo electrónico institucional"
                aria-label="Correo electrónico institucional"
        />
        <span for="academicEmail" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="username">Usuario<span class="text-danger">*</span></label>
        <input
                type="text"
                class="form-control"
                id="username"
                name="username"
                placeholder="Nombre de usuario"
                aria-label="Nombre de usuario"
        />
        <span for="username" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="password">Contraseña<span class="text-danger">*</span></label>
        <div class="input-group form-password-toggle">
            <input
                    type="password"
                    id="password"
                    class="form-control"
                    placeholder="Contraseña"
                    aria-describedby="Contraseña"
            />
            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            <button class="btn btn-outline-primary" id="passwordAuto" type="button">Generar</button>
        </div>
        <span for="password" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="enrollment">Matrícula<span class="text-danger">*</span></label>
        <div class="input-group">
            <input
                    type="text"
                    id="enrollment"
                    class="form-control"
                    placeholder="Matrícula"
                    aria-describedby="button-addon2"
            />
            <button class="btn btn-outline-primary" id="button-addon2" type="button">Generar</button>
        </div>
        <span for="enrollment" class="text-danger"></span>
    </div>

    <div class="col-3">
        <label class="form-label" for="responsibility">Responsabilidad<span class="text-danger">*</span></label>
        <input
                type="text"
                class="form-control"
                id="responsibility"
                name="responsibility"
                placeholder="Responsabilidad"
                aria-label="Responsabilidad"
        />
        <span for="responsibility" class="text-danger"></span>
    </div>

    <div class="col-md-3">
        <label class="form-label" for="flatpickrJoinDate">Fecha de ingreso</label>
        <input
                type="text"
                id="flatpickrJoinDate"
                class="form-control flatpickrDefault"
                placeholder="Seleccionar"
        />
    </div>

    <div class="col-3">
        <label class="form-label" for="resume">Resumen - CV</label>
        <input type="file" class="my-pond" name="resume" id="resume" data-max-file-size="2MB"/>
    </div>

    <div class="col-3">
        <label class="form-label" for="photo">Fotografía</label>
        <input type="file" class="my-pond" name="photo" id="photo" data-max-file-size="2MB"/>
    </div>

    <div class="border d-flex align-items-center bg-light" style="height: 35px;">
        <b>Otra información</b>
    </div>

    <div class="col-3">
        <label class="form-label" for="linkedin">Perfil de LinkedIn (Enlace)</label>
        <input
                type="url"
                class="form-control"
                id="linkedin"
                name="linkedin"
                placeholder="https://linkedin.com/"
                aria-label="LinkedIn"
        />
        <span for="linkedin" class="text-danger"></span>
    </div>

    <div class="col-6">
        <label class="form-label" for="otherInfo">Otra información, notas - <i>Opcional</i></label>
        <textarea

                name="otherInfo"
                id="otherInfo"
                class="form-control"
                placeholder="Notas"
                aria-label="Otra información, notas"></textarea>
    </div>

    <input type="hidden" name="teacherId" id="teacherId" value="@isset($teacher){{ $teacher->id }}@endisset"/>
</form>

{{-- Page scripts --}}
<script src="{{ asset(mix('js/scripts/forms/pickers/customPickr.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/form-filepond.js')) }}"></script>
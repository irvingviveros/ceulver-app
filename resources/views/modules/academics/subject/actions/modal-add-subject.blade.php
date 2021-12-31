<form class="add-new-record row gy-2 gx-2" id="subjectRegisterForm">

    <div class="col-12">
        <div class="col-md-6 basic-select2">
            <label class="form-label" for="schoolSelect">Nombre de la institución</label>
            <select class="form-select" id="schoolSelect">
                @foreach($schools as $school)
                    <option value="{{$school->id}}">{{$school->school_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-6">
        <label class="form-label" for="subjectName">Nombre<span class="text-danger">*</span></label>
        <input
                type="text"
                class="form-control"
                id="subjectName"
                name="subjectName"
                maxlength="100"
                placeholder="Nombre de la materia"
                aria-label="Nombre de la materia"
        />
        <span for="subjectName" class="text-danger"></span>
    </div>

    <div class="col-6">
        <label class="form-label" for="subjectCode">Clave o código<span class="text-danger">*</span></label>
        <input
                type="text"
                class="form-control"
                id="subjectCode"
                name="subjectCode"
                placeholder="Clave o código de la materia"
                aria-label="Clave o código de la materia"
        />
        <span for="subjectCode" class="text-danger"></span>
    </div>

    <div class="col-md-6">
        <label class="form-label" for="flatpickrDefault">Fecha de apertura<span class="text-danger">*</span></label>
        <input
                type="text"
                id="flatpickrDefault"
                class="form-control flatpickrDefault"
                placeholder="Seleccionar"
                required
        />
        <span for="flatpickrDefault" class="text-danger"></span>
    </div>

    <div class="col-md-6"></div>

    <div class="col-md-6">
        <label class="form-label" for="teacherSelect">Profesor(a) - <i>Opcional</i></label>
        <select class="form-select" id="teacherSelect">
{{--            @foreach($schools as $school)--}}
{{--                <option value="{{$school->id}}">{{$school->school_name}}</option>--}}
{{--            @endforeach--}}
            <option value="" disabled selected>Seleccionar</option>
            <option value="Irving">Irving Dalí Viveros Herrera</option>
            <option value="Irving">Miguel Ángel López</option>
            <option value="Irving">José Cárdenas Aguirre</option>
        </select>
    </div>

    <div class="col-12">
        <label class="form-label" for="subjectDescription">Descripción - <i>Opcional</i></label>
        <textarea
                name="subjectDescription"
                id="subjectDescription"
                class="form-control"
                placeholder="Descripción de la materia"
                aria-label="Matrícula"></textarea>
    </div>

    <input type="hidden" name="agreementId" id="agreementId" value="@isset($subject){{ $subject->id }}@endisset"/>
</form>

{{-- Page scripts --}}
<script src="{{ asset(mix('js/scripts/forms/pickers/customPickr.js')) }}"></script>
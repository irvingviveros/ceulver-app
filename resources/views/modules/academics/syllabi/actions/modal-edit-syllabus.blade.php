<form class="add-new-record row gy-2 gx-2" id="editForm">

    <div class="col-6">
        <div class="basic-select2">
            <label class="form-label" for="schoolSelect">Institución - Plantel</label>
            <span data-bs-toggle="popover"
                  data-bs-content="Modificar este atributo podría causar alteraciones no deseadas en los registros que estén vinculados."
                  data-bs-trigger="hover"
                  title data-bs-original-title="¿Por qué está deshabilitado?">
                <i type="button" data-feather='info' style="stroke: #1C3FAA"></i>
            </span>
            <select class="form-select" id="schoolSelect" disabled>
                <option selected value="{{$syllabus->school->school_name}}">{{$syllabus->school->school_name}}
                    - {{$syllabus->school->educationalSystem->name}}</option>
            </select>
        </div>
    </div>

    <div class="col-6">
        <label class="form-label" for="careerSelect">Carrera</label>
        <span data-bs-toggle="popover"
              data-bs-content="Modificar este atributo podría causar alteraciones no deseadas en los registros que estén vinculados."
              data-bs-trigger="hover"
              title data-bs-original-title="¿Por qué está deshabilitado?">
                <i type="button" data-feather='info' style="stroke: #1C3FAA"></i>
            </span>
        <select class="form-select" id="careerSelect" disabled>
            <option selected value="{{$syllabus->career->name}}">{{$syllabus->career->name}}</option>
        </select>
    </div>

    <div class="col-6">
        <label class="form-label" for="syllabusName">Nombre <span class="text-danger">*</span></label>
        <input
            type="text"
            class="form-control"
            id="syllabusName"
            name="syllabusName"
            maxlength="100"
            placeholder="Nombre del grupo"
            aria-label="Nombre del grupo"
            value="{{$syllabus->name}}"
        />
        <span for="syllabusName" class="text-danger"></span>
    </div>

    <div class="col-12">
        <label class="form-label" for="syllabusNote">Descripción - <i>Opcional</i></label>
        <textarea
            name="syllabusNote"
            id="syllabusNote"
            class="form-control"
            placeholder="Descripción de la retícula"
            aria-label="Descripción de la retícula">@isset($syllabus){{ $syllabus->note }}@endisset</textarea>
    </div>

    <input type="hidden" name="syllabusId" id="syllabusId" value="@isset($syllabus){{ $syllabus->id }}@endisset"/>
</form>

{{-- Page scripts --}}
<script src="{{ asset(mix('vendors/js/feather-icons/feather-icons.min.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/components/components-popovers.js'))}}"></script>

<script>feather.replace() //Icons</script>

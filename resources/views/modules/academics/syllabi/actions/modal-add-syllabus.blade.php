<form class="add-new-record row gy-2 gx-2" id="syllabusRegisterForm">

    <div class="col-12">
        <div class="col-md-6 basic-select2">
            <label class="form-label" for="schoolSelect">Institución - Plantel</label>
            <select class="form-select" id="schoolSelect">
                @foreach($schools as $school)
                    <option value="{{$school->id}}">{{$school->school_name}} - {{$school->educationalSystem->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-6">
        <label class="form-label" for="syllabusName">Nombre <span class="text-danger">*</span></label>
        <input
            type="text"
            class="form-control"
            id="syllabusName"
            name="syllabusName"
            maxlength="100"
            placeholder="Nombre de la retícula"
            aria-label="Nombre de la retícula"
        />
        <span for="syllabusName" class="text-danger"></span>
    </div>

    <div class="col-6">
        <label class="form-label" for="careerSelect">Carrera <span class="text-danger">*</span></label>
        <select class="form-select" id="schoolSelect">
            @foreach($careers as $career)
                <option value="{{$career->id}}">{{$career->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12">
        <label class="form-label" for="syllabusNote">Descripción - <i>Opcional</i></label>
        <textarea
                name="syllabusNote"
                id="syllabusNote"
                class="form-control"
                placeholder="Descripción de la retícula"
                aria-label="Descripción de la retícula"></textarea>
    </div>

    <input type="hidden" name="syllabusId" id="syllabusId" value="@isset($syllabus){{ $syllabus->id }}@endisset"/>
</form>

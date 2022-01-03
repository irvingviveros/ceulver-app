<form class="add-new-record row gy-2 gx-2" id="modalityRegisterForm">

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

    <div class="col-md-6">
        <label class="form-label" for="name">Nombre<span class="text-danger">*</span></label>
        <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                placeholder="Nombre de la modalidad"
                required
        />
        <span for="name" class="text-danger"></span>
    </div>

    <div class="col-12">
        <label class="form-label" for="note">Descripción - <i>Opcional</i></label>
        <textarea
                name="note"
                id="note"
                class="form-control"
                placeholder="Notas"
                aria-label="Notas"></textarea>
    </div>

    <input type="hidden" name="academicYearId" id="academicYearId" value="@isset($modality){{ $modality->id }}@endisset"/>
</form>
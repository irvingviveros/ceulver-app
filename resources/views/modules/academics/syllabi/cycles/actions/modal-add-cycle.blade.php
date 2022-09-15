<form class="add-new-record row gy-2 gx-2" id="registerForm">

    <div class="col-6">
        <label class="form-label" for="cycleName">Nombre <span class="text-danger">*</span></label>
        <input
            type="text"
            class="form-control"
            id="cycleName"
            name="cycleName"
            maxlength="100"
            placeholder="Nombre del ciclo"
            aria-label="Nombre del ciclo"
        />
        <span for="cycleName" class="text-danger"></span>
    </div>

    <div class="col-12">
        <label class="form-label" for="cycleNote">Descripción - <i>Opcional</i></label>
        <textarea
                name="cycleNote"
                id="cycleNote"
                class="form-control"
                placeholder="Descripción del ciclo"
                aria-label="Descripción del ciclo"></textarea>
    </div>

    <input type="hidden" name="cycleId" id="cycleId" value="@isset($cycle){{ $cycle->id }}@endisset"/>
    <input type="hidden" name="syllabusId" id="syllabusId" value="@isset($syllabus_id){{ $syllabus_id }}@endisset"/>
</form>

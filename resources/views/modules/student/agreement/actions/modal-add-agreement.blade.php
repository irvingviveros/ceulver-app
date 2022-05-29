<form class="add-new-record row gy-2 gx-2" id="agreementRegisterForm">
    <div class="col-12">
        <label class="form-label" for="agreementName">Nombre del convenio<span class="text-danger">*</span></label>

        <input
                type="text"
                class="form-control"
                id="agreementName"
                name="agreementName"
                placeholder="Nombre del convenio"
                aria-label="Nombre del convenio"
                required
        />

        <span for="agreementName" class="text-danger"></span>
    </div>

    <div class="col-12">
        <label class="form-label" for="agreementNote">Descripción<span class="text-danger">*</span></label>
        <textarea
                name="agreementNote"
                id="agreementNote"
                class="form-control"
                placeholder="Descripción del convenio"
                aria-label="Matrícula"></textarea>
    </div>

    <div class="col-12">
        <div class="col-md-6 basic-select2">
            <label class="form-label" for="select2-multiple">
                Asinación a escuela(s) -
                <i>Opcional</i>
            </label>
            <select class="select2 form-select" id="select2-multiple" multiple>
                @foreach($schools as $school)
                    <option value="{{$school->id}}">{{$school->school_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <input type="hidden" name="agreementId" id="agreementId" value="@isset($agreement){{ $agreement->id }}@endisset"/>
</form>
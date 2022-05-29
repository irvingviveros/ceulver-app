<form class="add-new-record row gy-2 gx-2" id="agreementEditForm">
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
            value="@isset($agreement){{ $agreement -> name }}@endisset"
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
            aria-label="Matrícula">@isset($agreement){{ $agreement -> note }}@endisset</textarea>
  </div>

  <div class="col-12">
    <div class="row">
      <div class="col-md-9 basic-select2">
        <label class="form-label" for="select2-multiple">
          Asinación a escuela(s) -
          <i>Opcional</i>
        </label>
        <select class="select2 form-select" id="select2-multiple" name="schools[]" multiple>
          @foreach($agreementSchools as $school)
            <option selected="{{ $school -> id }}" value="{{ $school -> id }}">{{ $school -> school_name }}</option>
          @endforeach
          @foreach($schools as $school)
            <option value="{{ $school -> id }}">{{ $school -> school_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3 mt-2 d-flex align-items-center form-check">
        <input class="form-check-input" type="checkbox" id="selectCheckbox"><i class="text-muted text-">&nbsp;Seleccionar todo</i>
      </div>
    </div>
  </div>

  <input type="hidden" name="agreementId" id="agreementId" value="@isset($agreement){{ $agreement->id }}@endisset"/>
</form>
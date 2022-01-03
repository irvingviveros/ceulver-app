<form class="add-new-record row gy-2 gx-2" id="editForm">

    <div class="col-12">
        <div class="col-md-6">
            <label class="form-label" for="school">Nombre de la institución</label>
            <input
                    type="text"
                    id="school"
                    class="form-control"
                    disabled
                    value="{{ $academicYear -> school -> school_name}}"
            >
        </div>
    </div>

    <div class="col-md-6">
        <label class="form-label" for="startDate">Fecha de apertura<span class="text-danger">*</span></label>
        <input
                type="text"
                id="startDate"
                name="startDate"
                class="form-control flatpickrDefault"
                placeholder="Seleccionar"
                value="{{ $academicYear -> start_date }}"
                required
        />
        <span for="startDate" class="text-danger"></span>
    </div>

    <div class="col-md-6">
        <label class="form-label" for="endDate">Fecha de finalización<span class="text-danger">*</span></label>
        <input
                type="text"
                id="endDate"
                name="endDate"
                class="form-control flatpickrDefault"
                placeholder="Seleccionar"
                value="{{ $academicYear -> end_date }}"
                required
        />
        <span for="endDate" class="text-danger"></span>
    </div>

    <div class="col-12">
        <label class="form-label" for="note">Descripción - <i>Opcional</i></label>
        <textarea
                name="note"
                id="note"
                class="form-control"
                placeholder="Notas"
                aria-label="Notas">{{ $academicYear->note }}</textarea>
    </div>

    <input type="hidden" name="academicYearId" id="academicYearId" value="@isset($academicYear){{ $academicYear->id }}@endisset"/>
</form>

{{-- Page scripts --}}
<script src="{{ asset(mix('js/scripts/forms/pickers/customPickr.js')) }}"></script>
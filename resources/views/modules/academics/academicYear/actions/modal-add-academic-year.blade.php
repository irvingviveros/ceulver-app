<form class="add-new-record row gy-2 gx-2" id="academicYearRegisterForm">

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
        <label class="form-label" for="startDate">Fecha de apertura<span class="text-danger">*</span></label>
        <input
                type="text"
                id="startDate"
                name="startDate"
                class="form-control flatpickrDefault"
                placeholder="Seleccionar"
                required
        />
        <span for="flatpickrStart" class="text-danger"></span>
    </div>

    <div class="col-md-6">
        <label class="form-label" for="endDate">Fecha de finalización<span class="text-danger">*</span></label>
        <input
                type="text"
                id="endDate"
                name="endDate"
                class="form-control flatpickrDefault"
                placeholder="Seleccionar"
                required
        />
        <span for="flatpickrEnd" class="text-danger"></span>
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

    <input type="hidden" name="academicYearId" id="academicYearId" value="@isset($academicYear){{ $academicYear->id }}@endisset"/>
</form>

{{-- Page scripts --}}
<script src="{{ asset(mix('js/scripts/forms/pickers/customPickr.js')) }}"></script>
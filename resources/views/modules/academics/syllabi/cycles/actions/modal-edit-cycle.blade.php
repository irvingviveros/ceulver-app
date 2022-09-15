<form class="add-new-record row gy-2 gx-2" id="editForm">

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
            value="{{ $cycle->name }}"
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
            aria-label="Descripción del ciclo"> {{ $cycle->note }}</textarea>
    </div>

    <input type="hidden" name="cycleId" id="cycleId" value="@isset($cycle){{ $cycle->id }}@endisset"/>
</form>

{{-- Page scripts --}}
<script src="{{ asset(mix('vendors/js/feather-icons/feather-icons.min.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/components/components-popovers.js'))}}"></script>

<script>feather.replace() //Icons</script>

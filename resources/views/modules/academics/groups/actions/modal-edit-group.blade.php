<form class="add-new-record row gy-2 gx-2" id="editForm">

    <div class="col-12">
        <div class="col-md-6 basic-select2">
            <label class="form-label" for="schoolSelect">Institución - Plantel</label>
            <span data-bs-toggle="popover"
                  data-bs-content="Modificar este atributo podría causar alteraciones no deseadas en los registros que estén vinculados."
                  data-bs-trigger="hover"
                  title data-bs-original-title="¿Por qué está deshabilitado?">
            <i type="button" data-feather='info' style="stroke: #1C3FAA"></i>
        </span>
            <select class="form-select" id="schoolSelect" disabled>
                <option selected value="{{$group->school->school_name }}">{{$group->school->school_name}} - {{$group->school->educationalSystem->name}}</option>
            </select>
        </div>
    </div>

    <div class="col-6">
        <label class="form-label" for="groupName">Nombre<span class="text-danger">*</span></label>
        <input
            type="text"
            class="form-control"
            id="groupName"
            name="groupName"
            maxlength="100"
            placeholder="Nombre del grupo"
            aria-label="Nombre del grupo"
            value="{{$group->name}}"
        />
        <span for="groupName" class="text-danger"></span>
    </div>

    <div class="col-md-6"></div>

    <div class="col-12">
        <label class="form-label" for="groupNote">Descripción - <i>Opcional</i></label>
        <textarea
            name="groupNote"
            id="groupNote"
            class="form-control"
            placeholder="Descripción del grupo"
            aria-label="Descripción del grupo">@isset($group){{ $group -> note }}@endisset</textarea>
    </div>

    <input type="hidden" name="groupId" id="groupId" value="@isset($group){{ $group->id }}@endisset"/>
</form>

{{-- Page scripts --}}
<script src="{{ asset(mix('vendors/js/feather-icons/feather-icons.min.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/components/components-popovers.js'))}}"></script>

<script>feather.replace() //Icons</script>

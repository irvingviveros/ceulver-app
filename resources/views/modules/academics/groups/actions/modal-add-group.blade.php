<form class="add-new-record row gy-2 gx-2" id="groupRegisterForm">

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
        <label class="form-label" for="groupName">Nombre<span class="text-danger">*</span></label>
        <input
                type="text"
                class="form-control"
                id="groupName"
                name="groupName"
                maxlength="100"
                placeholder="Nombre del grupo"
                aria-label="Nombre del grupo"
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
                aria-label="Descripción del grupo"></textarea>
    </div>

    <input type="hidden" name="groupId" id="groupId" value="@isset($group){{ $group->id }}@endisset"/>
</form>

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
        <div class="row">
            <label class="form-label">Descuento -
                <i>Opcional</i>
            </label>
            <div class="col-md">
                <div class="input-group">
                    <div class="input-group-text">
                        <div class="form-check">
                            <input
                                    type="radio"
                                    class="form-check-input"
                                    name="discountRadio"
                                    id="discountQuantity" />
                        </div>
                    </div>
                    <span class="input-group-text">$</span>
                    <input
                            type="number"
                            class="form-control"
                            name="discountQuantity"
                            placeholder="Cantidad">
                </div>
            </div>
            <div class="col-md">
                <div class="input-group">
                    <div class="input-group-text">
                        <div class="form-check">
                            <input
                                    type="radio"
                                    name="discountRadio"
                                    class="form-check-input" />
                        </div>
                    </div>
                    <input
                            type="number"
                            class="form-control"
                            name="discountPercentage"
                            placeholder="Porcentaje">
                    <span class="input-group-text">%</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="col-md-6 basic-select2">
            <label class="form-label" for="select2-multiple">
                Asinación a escuela(s) -
                <i>Opcional</i>
            </label>
            <select class="select2 form-select" id="select2-multiple" multiple>
                <optgroup label="CEULVER">
                    @foreach($schools as $school)
                        <option value="{{$school->id}}">{{$school->school_name}}</option>
                    @endforeach
                </optgroup>
            </select>
        </div>
    </div>

    <input type="hidden" name="agreementId" id="agreementId" value="@isset($agreement){{ $agreement->id }}@endisset"/>
</form>

{{-- Esta es una copia de otra plantilla pero peude servir para las becas, hay que modificarla --}}
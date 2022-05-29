<form class="add-new-record row gy-2 gx-2" id="careerRegisterForm">
    <div class="col-12">
        <label class="form-label" for="careerName">Nombre de la carrera&nbsp;<span class="text-danger">*</span></label>

        <input
                type="text"
                class="form-control"
                id="careerName"
                name="careerName"
                placeholder="Nombre de la carrera"
                aria-label="Nombre de la carrera"
                required
        />

        <span for="careerName" class="text-danger"></span>
    </div>

    <div class="col-12">
        <label class="form-label" for="careerEnrollment">Matrícula&nbsp;<span class="text-danger">*</span></label>

        <input
                type="text"
                id="careerEnrollment"
                class="form-control"
                name="careerEnrollment"
                placeholder="Matrícula"
                aria-label="Matrícula"
                required
        />

        <span for="careerEnrollment" class="text-danger"></span>
    </div>

    <div class="col-12">
        <label class="form-label" for="openingDate">Fecha de apertura&nbsp;<span class="text-danger">*</span></label>

        <input
                type="text"
                id="openingDate"
                class="form-control"
                name="openingDate"
                placeholder="Fecha de apertura"
                required
        />

        <span for="openingDate" class="text-danger"></span>
    </div>

    <input type="hidden" name="careerId" id="careerId" value="@isset($career){{ $career->id }}@endisset"/>
</form>
<!-- Edit User Modal -->
<div class="modal fade" id="showSchoolDetails" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Detalles de la institución</h1>
                    <p>La actualización de los datos de la institución recibirá una auditoría de privacidad.</p>
                </div>
                <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="schoolCode">Código de la escuela</label>
                        <input
                                type="text"
                                id="schoolCode"
                                name="school_id"
                                class="form-control"
                                value=""
                                disabled
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="school_name">Nombre</label>
                        <input
                                type="text"
                                id="school_name"
                                name="school_name"
                                class="form-control"
                                value=""
                                disabled
                        />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="school_address">Dirección</label>
                        <input
                                type="text"
                                id="school_address"
                                name="school_address"
                                class="form-control"
                                value=""
                                disabled
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="school_email">Email principal</label>
                        <input
                                type="email"
                                id="school_email"
                                name="school_email"
                                class="form-control"
                                value=""
                                disabled
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="school_phone">Teléfono principal</label>
                        <input
                                type="tel"
                                id="school_phone"
                                name="school_phone"
                                class="form-control phone-number-mask"
                                value=""
                                disabled
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="school-registration">Fecha de registro</label>
                        <input
                                type="text"
                                id="school-registration"
                                name="school-registration"
                                class="form-control flatpickr-human-friendly"
                                placeholder="Octubre 14, 2020"
                                disabled
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="school-status">Habilitar escuela</label>
                        <input
                                type="text"
                                id="school-status"
                                name="school-status"
                                class="form-select"
                                aria-label="Default select example"
                                value="Activo"
                                disabled
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="school-frotend">Habilitar sitio web</label>
                        <input
                                type="text"
                                id="school-frotend"
                                name="school-frotend"
                                class="form-control"
                                value="Activo"
                                disabled
                        />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="school-admissions">Habilitar admisiones en línea</label>
                        <input
                                type="text"
                                id="school-admissions"
                                name="school-admissions"
                                class="form-control"
                                value="Activo"
                                disabled
                        />
                    </div>
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">Editar</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Cerrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->

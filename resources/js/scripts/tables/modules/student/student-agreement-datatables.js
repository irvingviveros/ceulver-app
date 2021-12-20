const StudentAgreementDatatables = (function () {
    'use strict';

    const urlController = Application.getUrl() + 'admin/manage-students/agreements/';

    function initialize() {
        // TODO EVENTOS DE FILTROS DE LISTADO
        initializeTable();
    }

    // Get and initializes the datatable
    function initializeTable() {
        // JQuery selector for table
        let table =  $('#dataTable');

        // Apply icons on all table pages
        feather.replace();

        // Apply Datatable default configuration
        table.DataTable(
            Application.getDatatableConfiguration(StudentAgreementDatatables)
        )

    }

    // Initializes events from the datatable
    function initializeEvents() {

        let table =  $('#dataTable');

        // Create event
        $('.createEntry').on('click', function () {
            StudentAgreementDatatables.getRegisterForm().then(function () {
                let modal = Modal.create({
                    id: 'agreementRegisterForm'
                    , title: 'Crear convenio'
                    , content: arguments[0]
                    , okButtonText: 'Crear'
                    , cancelButtonText: 'Cancelar'
                });

                // Assign attributes of the method select2 to the select field
                $('.select2').select2();

                // Show modal
                modal.modal('show').on('shown.bs.modal', function () {
                    createEntryForm(modal)
                });
            });
        });

        // Update event
        $('#dataTable tbody').on('click', '.item-edit', function (event) {

            let agreementId = $(event.currentTarget).attr('data-id');

            StudentAgreementDatatables.getEditForm(
                agreementId
            ).then(function () {
                let modal = Modal.create({
                    id: 'agreementEditForm'
                    , title: 'Editar convenio'
                    , content: arguments[0]
                    , okButtonText: 'Guardar'
                    , cancelButtonText: 'Cerrar'
                });

                // Assign attributes of the method select2 to the select field
                $('.select2').select2();
                // Check|uncheck all
                $('#selectCheckbox').change(function () {
                    let isChecked = $(this).is(':checked');
                    $('#select2-multiple').select2('destroy').find('option').prop('selected', 'selected').end().select2();
                    if(!isChecked){
                        $('#select2-multiple').select2('destroy').find('option').prop('selected', false).end().select2();
                    }
                });

                modal.modal('show').on('shown.bs.modal', function () {
                    updateAgreementForm(modal)
                });
            });
        });

        // Assign methods from DataTable object
        table = $('#dataTable').DataTable();

        // Delete event
        $('#dataTable tbody').on('click', '.delete-record',  function (event) {

            let agreementId = $(event.currentTarget).attr('data-id');
            let row = $(this);

            // Show Swal component and delete
            Delete.run(StudentAgreementDatatables, agreementId, table, row);
        });
    }

    // Loads a modal and creates a new record
    function createEntryForm(modal, table) {

        modal.find('[id="okModal"]').on('click', function () {
            let form = $("form[id='agreementRegisterForm']");

            if (!form.valid()) {
                return;
            }

            StudentAgreementDatatables.save({
                _token: Application.getToken()
                , name: form.find('input[id="agreementName"]').val()
                , note: form.find('textarea[id="agreementNote"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido creado correctamente', 'Registro creado'
                );

                Modal.close(modal.attr('id'));

                // Reload table
                StudentAgreementDatatables.getList().then(function () {
                    $('table[id="agreementTable"]').DataTable().destroy;

                    $('div[id="dataList"]').html(arguments[0]);

                    initializeTable();
                });
            });
        });

        //loadFormValidation();
    }

    // Loads a modal and update a record
    function updateAgreementForm(modal) {

        modal.find('[id="okModal"]').on('click', function () {
            let form = $("form[id='agreementEditForm']");

            if (!form.valid()) {
                return;
            }

            // All this data goes to the update function controller
            StudentAgreementDatatables.update({
                _token: Application.getToken()
                , id: form.find('input[name="agreementId"]').val()
                , name: form.find('input[name="agreementName"]').val()
                , note: form.find('textarea[name="agreementNote"]').val()
                , schools: form.find('select[name="schools[]"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido actualizado correctamente', 'Registro actualizado'
                );

                Modal.close(modal.attr('id'));

                // Reload table
                StudentAgreementDatatables.getList().then(function () {
                    $('table[id="dataTable"]').DataTable().destroy;

                    $('div[id="dataList"]').html(arguments[0]);

                    initializeTable();
                });
            });
        });

        loadFormValidation();

    }

    // Load validations
    function loadFormValidation() {
        let agreementRegisterForm = $("form[id='agreementRegisterForm']");

        // Validate that the contents of a field are not spaces
        $.validator.addMethod("emptyField", function (value, element) {
            let valido = value.trim().length !== 0;

            return this.optional(element) || valido;
        });

        agreementRegisterForm.validate({
            rules: {
                agreementName: {
                    required: true
                    , emptyField: true
                }
            }
            , messages: {
                agreementName: {
                    required: "El nombre del convenio es requerido"
                    , emptyField: "Requerido"
                }
            }
            , errorPlacement: function (error, element) {
                agreementRegisterForm.find("span[for='" + element.attr('id') + "']").append(error);
            }
        });

        return agreementRegisterForm;
    }

    return {
        // Initialize datatable
        load: function () {
            initialize();
        }
        // Load create, update and edit events to the datatable
        , loadEvents: function () {
            initializeEvents();
        }
        // Loads the register form
        , getRegisterForm: function () {
            return Configuration.consume({
                url: urlController + `create`
                , method: 'GET'
                , data: {
                    _token: Application.getToken()
                }
            });
        }
        // Loads the edit form
        , getEditForm: function (id) {
            return Configuration.consume({
                url: urlController + `${id}/edit`
                , method: 'GET'
                , data: {
                    _token: Application.getToken()
                }
            })
        }
        // Create a new record into the database
        , save: function (data) {
            return Configuration.consume({
                url: urlController
                , method: 'POST'
                , data: data
            });
        }
        // Update a record from the database
        , update: function (data) {
            return Configuration.consume({
                url: urlController + data.id
                , method: 'PUT'
                , data: data
            })
        }
        // Delete a record from the database
        , delete: function (id) {
            return Configuration.consume({
                url: urlController + id
                , data: {
                    _method: 'delete'
                    , _token: Application.getToken()
                }
            });
        }
        // Get entries from the database
        , getList: function () {
            return Configuration.consume({
                url: urlController + 'getList'
                , method: 'GET'
                , data: {
                    _token: Application.getToken()
                }
            });
        }
    }
})();
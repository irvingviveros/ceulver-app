const ModalityDatatable = (function () {
    'use strict';

    const urlController = Application.getUrl() + 'admin/modalities/';

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
            Application.getDatatableConfiguration(ModalityDatatable)
        )

    }

    // Initializes events from the datatable
    function initializeEvents() {

        let table =  $('#dataTable');

        // Create event
        $('.createEntry').on('click', function () {
            ModalityDatatable.getRegisterForm().then(function () {
                let modal = Modal.create({
                    id: 'modalityRegisterForm'
                    , title: 'Crear modalidad'
                    , content: arguments[0]
                    , okButtonText: 'Crear'
                    , cancelButtonText: 'Cancelar'
                    , size: 'lg'
                });

                // Show modal
                modal.modal('show').on('shown.bs.modal', function () {
                    createForm(modal)
                });
            });
        });

        // Update event
        $('#dataTable tbody').on('click', '.item-edit', function (event) {

            let itemId = $(event.currentTarget).attr('data-id');

            ModalityDatatable.getEditForm(
                itemId
            ).then(function () {
                let modal = Modal.create({
                    id: 'editForm'
                    , title: 'Editar modalidad'
                    , content: arguments[0]
                    , okButtonText: 'Guardar'
                    , cancelButtonText: 'Cerrar'
                    , size: 'lg'
                });

                modal.modal('show').on('shown.bs.modal', function () {
                    updateForm(modal)
                });
            });
        });

        // Assign methods from DataTable object
        table = $('#dataTable').DataTable();

        // Delete event
        $('#dataTable tbody').on('click', '.delete-record',  function (event) {

            let dataId = $(event.currentTarget).attr('data-id');
            let row = $(this);

            // Show Swal component and delete
            Delete.run(ModalityDatatable, dataId, table, row);
        });
    }

    // Loads a modal and creates a new record
    function createForm(modal, table) {

        modal.find('[id="okModal"]').on('click', function () {

            let form = $("form[id='modalityRegisterForm']");

            if (!form.valid()) {
                return;
            }

            // This is sent to the store request parameter
            ModalityDatatable.save({
                _token: Application.getToken()
                , school_id: form.find('select[id="schoolSelect"]').val()
                , name: form.find('input[id="name"]').val()
                , note: form.find('textarea[id="note"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido creado correctamente', 'Registro creado'
                );

                Modal.close(modal.attr('id'));

                // Reload table
                ModalityDatatable.getList().then(function () {
                    $('table[id="modalityTable"]').DataTable().destroy;

                    $('div[id="dataList"]').html(arguments[0]);

                    initializeTable();
                });
            });
        });

        loadFormValidation();
    }

    // Loads a modal and update a record
    function updateForm(modal) {

        modal.find('[id="okModal"]').on('click', function () {
            let form = $("form[id='editForm']");

            if (!form.valid()) {
                return;
            }

            // All this data goes to the update function controller
            ModalityDatatable.update({
                _token: Application.getToken()
                , id: form.find('input[name="modalityId"]').val()
                , name: form.find('input[id="name"]').val()
                , note: form.find('textarea[id="note"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido actualizado correctamente', 'Registro actualizado'
                );

                Modal.close(modal.attr('id'));

                // Reload table
                ModalityDatatable.getList().then(function () {
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
        let form = $("form[id='modalityRegisterForm']");
        if (form.length === 0){
            form = $("form[id='editForm']");
        }
        // Validate that the contents of a field are not spaces
        $.validator.addMethod("emptyField", function (value, element) {
            let valido = value.trim().length !== 0;

            return this.optional(element) || valido;
        });

        form.validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 30
                }
            }
            , messages: {
                name: {
                    required: "El nombre de la modalidad es requerido",
                    maxlength: "El nombre es muy largo, por favor intente con uno más corto o contacte al admin."
                }
            }
            , errorPlacement: function (error, element) {
                form.find("span[for='" + element.attr('id') + "']").append(error);
            }
        });

        return form;
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
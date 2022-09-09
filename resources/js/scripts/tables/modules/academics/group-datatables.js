const GroupDatatable = (function () {
    'use strict';

    // Main route
    const urlController = Application.getUrl();

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
            Application.getDatatableConfiguration(GroupDatatable)
        )
    }

    // Initializes events from the datatable
    function initializeEvents() {

        let table =  $('#dataTable');

        // Create event
        $('.createEntry').on('click', function () {
            GroupDatatable.getRegisterForm().then(function () {
                let modal = Modal.create({
                    id: 'groupRegisterForm' // TODO: Cambiar valor, plantilla
                    , title: 'Registrar grupo'
                    , content: arguments[0]
                    , okButtonText: 'Crear'
                    , cancelButtonText: 'Cancelar'
                    , size: 'lg' // lg, xl
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

            GroupDatatable.getEditForm(
                itemId
            ).then(function () {
                let modal = Modal.create({
                    id: 'editForm'
                    , title: 'Editar grupo' // TODO: Cambiar valor, plantilla
                    , content: arguments[0]
                    , okButtonText: 'Guardar'
                    , cancelButtonText: 'Cerrar'
                    , size: 'lg' // TODO: Cambiar tamaño
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
            Delete.run(GroupDatatable, dataId, table, row);
        });
    }

    // Loads a modal and creates a new record
    function createForm(modal) {

        modal.find('[id="okModal"]').on('click', function () {

            let form = $("form[id='groupRegisterForm']"); // TODO: Cambiar valor, plantilla

            if (!form.valid()) {
                return;
            }

            // This is sent to the store request parameter
            GroupDatatable.save({
                _token: Application.getToken()
                , school_id: form.find('select[id="schoolSelect"]').val()
                , name: form.find('input[id="groupName"]').val()
                , note: form.find('textarea[id="groupNote"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido creado correctamente', 'Registro creado'
                );

                Modal.close(modal.attr('id'));

                // Reload table
                GroupDatatable.getList().then(function () {
                    $('table[id="studentTable"]').DataTable().destroy; // TODO: Cambiar valor, plantilla

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
            GroupDatatable.update({
                _token: Application.getToken()
                , id: form.find('input[name="groupId"]').val()
                , name: form.find('input[id="groupName"]').val()
                , note: form.find('textarea[id="groupNote"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido actualizado correctamente', 'Registro actualizado'
                );

                Modal.close(modal.attr('id'));

                // Reload table
                GroupDatatable.getList().then(function () {
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
        let form = $("form[id='groupForm']"); // TODO: Cambiar valor, plantilla
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
                startDate: {
                    required: true
                },
                endDate: {
                    required: true
                }
            }
            , messages: {
                startDate: {
                    required: "La fecha de inicio es requerido"
                },
                endDate: {
                    required: "La fecha de finalización es requerido"
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

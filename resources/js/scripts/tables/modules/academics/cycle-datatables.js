const CycleDatatable = (function () {
    'use strict';

    // Main route
    const urlController = Application.getUrl().slice(0, -1);
    // Nested URL (cycles with shallow in routes)
    const nestedUrl = window.location.origin + '/admin/cycles/'

    // Get and initializes the datatable
    function initializeTable() {
        // JQuery selector for table
        let table = $('#dataTable');
        // Apply icons on all table pages
        feather.replace();
        // Apply Datatable default configuration
        table.DataTable(
            Application.getDatatableConfiguration(CycleDatatable)
        )
    }

    // Initializes events from the datatable
    function initializeEvents() {

        let table = $('#dataTable');

        // Create event
        $('.createEntry').on('click', function () {
            CycleDatatable.getRegisterForm().then(function () {
                let modal = Modal.create({
                    id: 'registerForm'
                    , title: 'Registrar ciclo'
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

            // Nested resources
            let childrenId = $(event.currentTarget).attr('data-children');

            CycleDatatable.getEditForm(
                childrenId
            ).then(function () {
                let modal = Modal.create({
                    id: 'editForm'
                    , title: 'Editar ciclo' // TODO: Cambiar valor, plantilla
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
        $('#dataTable tbody').on('click', '.delete-record', function (event) {

            let dataId = $(event.currentTarget).attr('data-id');
            let row = $(this);

            // Show Swal component and delete
            Delete.run(CycleDatatable, dataId, table, row);
        });
    }

    // Loads a modal and creates a new record
    function createForm(modal) {

        modal.find('[id="okModal"]').on('click', function () {

            let form = $("form[id='registerForm']");
            let parentId = form.find('input[id="syllabusId"]').val();

            if (!form.valid()) {
                return;
            }

            // This is sent to the store request parameter
            CycleDatatable.save({
                _token: Application.getToken()
                , syllabus_id: parentId
                , name: form.find('input[id="cycleName"]').val()
                , note: form.find('textarea[id="cycleNote"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido creado correctamente', 'Registro creado'
                );

                Modal.close(modal.attr('id'));

                // TODO: Cambiar esto, recargar solo el registro o la table que se creó

                //Reload table
                CycleDatatable.getList().then(function () {
                    $('table[id="dataTable"]').DataTable().destroy;

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
            CycleDatatable.update({
                _token: Application.getToken()
                , id: form.find('input[name="cycleId"]').val()
                , name: form.find('input[id="cycleName"]').val()
                , note: form.find('textarea[id="cycleNote"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido actualizado correctamente', 'Registro actualizado'
                );

                Modal.close(modal.attr('id'));

                // Reload table
                CycleDatatable.getList().then(function () {
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
        let form = $("form[id='cycleForm']"); // TODO: Cambiar valor, plantilla
        if (form.length === 0) {
            form = $("form[id='editForm']");
        }
        // Validate that the contents of a field are not spaces
        $.validator.addMethod("emptyField", function (value, element) {
            let valido = value.trim().length !== 0;

            return this.optional(element) || valido;
        });

        form.validate({
            rules: {}
            , messages: {}
            , errorPlacement: function (error, element) {
                form.find("span[for='" + element.attr('id') + "']").append(error);
            }
        });

        return form;
    }

    return {
        // Initialize datatable
        load: function () {
            initializeTable();
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
        , getEditForm: function (childrenId) {
            return Configuration.consume({
                url: nestedUrl + `${childrenId}/edit`
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
                url: nestedUrl + data.id
                , method: 'PUT'
                , data: data
            })
        }
        // Delete a record from the database
        , delete: function (id) {
            return Configuration.consume({
                url: window.location.origin + '/admin/cycles/' + id
                , data: {
                    _method: 'DELETE'
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

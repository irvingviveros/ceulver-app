const StudentReceiptsEvents = (function () {
    'use strict';

    // Main route
    const urlController = Application.getUrl();

    // Get educational system.
    let educationalSystem = $("#educationalSystemName").val();

    // Get and initializes the datatable
    function initializeTable() {
        // JQuery selector for table
        let table = $('#dataTable');
        // Apply Datatable default events and configuration
        table.DataTable(
            Application.getDatatableConfiguration(
                StudentReceiptsEvents, StudentReceiptsDatatable(educationalSystem)
            ))
        // Apply icons on all table pages
        feather.replace();
    }

    // Initializes events from the datatable
    function initializeEvents() {

        // Assign methods from DataTable object
        let table = $('#dataTable').DataTable();

        // Create event
        $('.createEntry').on('click', function () {
            StudentReceiptsEvents.getRegisterForm().then(function () {
                let modal = Modal.create({
                    id: 'registerForm'
                    , title: 'Registrar recibo' // TODO: Cambiar valor, plantilla
                    , content: arguments[0]
                    , okButtonText: 'Crear'
                    , cancelButtonText: 'Cancelar'
                    , size: 'xl' // lg, xl
                });
                // Show modal
                modal.modal('show').on('shown.bs.modal', function () {
                    createForm(modal)
                });
            });
        });

        // Show data event
        $('#dataTable tbody').on('click', '.item-show', function (event) {
            let itemId = $(event.currentTarget).attr('data-id');
            StudentReceiptsEvents.getShowForm(
                itemId
            ).then(function () {
                let modal = Modal.create({
                    id: 'showData'
                    , title: 'Información del registro'
                    , content: arguments[0]
                    , okButtonText: 'Editar'
                    , cancelButtonText: 'Cerrar'
                    , size: 'xl'
                });

                modal.modal('show').on('shown.bs.modal', function () {
                    showModal(modal)
                });
            });
        });

        // Update event
        $('#dataTable tbody').on('click', '.item-edit', function (event) {

            let itemId = $(event.currentTarget).attr('data-id');

            StudentReceiptsEvents.getEditForm(
                itemId
            ).then(function () {
                let modal = Modal.create({
                    id: 'editForm'
                    , title: 'Editar registro'
                    , content: arguments[0]
                    , okButtonText: 'Guardar'
                    , cancelButtonText: 'Cerrar'
                    , size: 'xl'
                });

                modal.modal('show').on('shown.bs.modal', function () {
                    updateForm(modal)
                });
            });
        });

        // Delete event
        $('#dataTable tbody').on('click', '.delete-record', function (event) {

            let dataId = $(event.currentTarget).attr('data-id');
            let row = $(this);

            // Show Swal component and delete
            Delete.run(StudentReceiptsEvents, dataId, table, row);
        });

        // Advanced column search events
        $('.filter-input').keyup(function () {
            table.column($(this).data('column'))
                .search($(this).val())
                .draw();
        });

        $('.filter-input').change(function () {
            table.column($(this).data('column'))
                .search($(this).val())
                .draw();
        });
        // End advanced column search events
    }

    function showModal(modal) {
        modal.find('[id="okModal"]').on('click', function () {
            Modal.close(modal.attr('id'));
        });
    }

    // Loads a modal and creates a new record
    function createForm(modal) {

        modal.find('[id="okModal"]').on('click', function () {

            let form = $("form[id='registerForm']");
            // JS validations before submit
            if (!FormIsValid(form)) {
                AppNotification.show(
                    'warning', 'Hubo un error al intentar crear el registro.', 'Advertencia'
                );
                return;
            }
            // This is sent to the store request parameter
            StudentReceiptsEvents.save({
                _token: Application.getToken(),
                student_id: form.find('input[id="student-id"]').val(),
                reference: form.find('input[id="student-reference"]').val(),
                sheet: form.find('input[id="payment-sheet"]').val(),
                payment_date: form.find('input[id="payment-date"]').val(),
                payment_method: form.find('select[id="payment-method"]').val(),
                payment_concept: form.find('input[id="payment-concept"]').val(),
                amount: form.find('input[id="payment-amount"]').val(),
                note: form.find('input[id="note"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido creado correctamente', 'Registro creado'
                );

                Modal.close(modal.attr('id'));
                // Reload table
                reloadTable($('table[id="dataTable"]'))
            });

        });
    }

    // Loads a modal and update a record
    function updateForm(modal) {

        modal.find('[id="okModal"]').on('click', function () {
            let form = $("form[id='editForm']");

            // JS validations before submit
            if (!FormIsValid(form)) {
                AppNotification.show(
                    'warning',
                    'Hubo un error al intentar actualizar el registro. Verifique la información.',
                    'Error'
                );
                return;
            }

            // All this data goes to the update function controller
            StudentReceiptsEvents.update({
                _token: Application.getToken(),
                receipt_id: form.find('input[id="receipt-id"]').val(),
                student_id: form.find('input[id="student-id"]').val(),
                student_receipt_id: form.find('input[id="student-receipt-id"]').val(),
                reference: form.find('input[id="student-reference"]').val(),
                sheet: form.find('input[id="payment-sheet"]').val(),
                payment_date: form.find('input[id="payment-date"]').val(),
                payment_method: form.find('select[id="payment-method"]').val(),
                payment_concept: form.find('input[id="payment-concept"]').val(),
                amount: form.find('input[id="payment-amount"]').val(),
                note: form.find('textarea[id="note"]').val()
            }).then(function () {
                AppNotification.show(
                    'success',
                    'El registro ha sido actualizado correctamente.',
                    'Registro actualizado'
                );

                Modal.close(modal.attr('id'));

                // Reload table
                reloadTable($('table[id="dataTable"]'))
            });
        });
    }

    // Reload ajax datatable
    function reloadTable(datatable) {
        datatable.DataTable().ajax.reload();
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
        , getEditForm: function (id) {
            return Configuration.consume({
                url: urlController + `${id}/edit`
                , method: 'GET'
                , data: {
                    _token: Application.getToken()
                }
            })
        }
        // Loads the edit form
        , getShowForm: function (id) {
            return Configuration.consume({
                url: urlController + `${id}`
                , method: 'GET'
                , data: {
                    _token: Application.getToken()
                }
            })
        }
        // Create a new record into the database
        , save: function (data) {
            // Return string without trailing slash
            let newUrl = urlController.substr(0, urlController.length - 1);
            return Configuration.consume({
                url: newUrl
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
    }
})();

const StudentDatatable = (function () {
    'use strict';

    // Main route
    const urlController = Application.getUrl();

    // Get and initializes the datatable
    function initializeTable() {
        // JQuery selector for table
        let table =  $('#dataTable');
        // Apply icons on all table pages
        feather.replace();
        // Apply Datatable default configuration
        table.DataTable(
            Application.getDatatableConfiguration(StudentDatatable)
        )
    }

    // Initializes events from the datatable
    function initializeEvents() {

        let table =  $('#dataTable');
        // Create event
        $('.createEntry').on('click', function () {
            StudentDatatable.getRegisterForm().then(function () {
                let modal = Modal.create({
                    id: 'registerForm'
                    , title: 'Registrar alumno' // TODO: Cambiar valor, plantilla
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

        // Update event
        $('#dataTable tbody').on('click', '.item-edit', function (event) {

            let itemId = $(event.currentTarget).attr('data-id');

            StudentDatatable.getEditForm(
                itemId
            ).then(function () {
                let modal = Modal.create({
                    id: 'editForm'
                    , title: 'Editar generación'
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
            Delete.run(StudentDatatable, dataId, table, row);
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
            } else {
                // This is sent to the store request parameter
                StudentDatatable.save({
                    _token: Application.getToken()
                    , school_id: form.find('select[id="schoolSelect"]').val()
                    , paternal_surname: form.find('input[id="paternalSurname"]').val()
                    , maternal_surname: form.find('input[id="maternalSurname"]').val()
                    , first_name: form.find('input[id="firstName"]').val()
                    , birth_date: form.find('input[id="birthday"]').val()
                    , national_id: form.find('input[id="nationalId"]').val()
                    , address: form.find('input[id="address"]').val()
                    , occupation: form.find('input[id="occupation"]').val()
                    , sex: form.find('select[id="sexSelect"]').val()
                    , marital_status: form.find('select[id="maritalStatus"]').val()
                    , email: form.find('input[id="email"]').val()
                    , phone: form.find('input[id="phone"]').val()
                    , blood_group: form.find('select[id="bloodGroup"]').val()
                    , ailments: form.find('input[id="ailments"]').val()
                    , allergies: form.find('input[id="allergies"]').val()
                    , career: form.find('select[id="careerSelect"]').val()
                    , enrollment: form.find('input[id="enrollment"]').val()
                    , payment_reference: form.find('input[id="paymentReference"]').val()
                    , guardian_last_name: form.find('input[id="guardianLastName"]').val()
                    , guardian_first_name: form.find('input[id="guardianFirstName"]').val()
                    , guardian_relationship: form.find('select[id="guardianRelationship"]').val()
                    , guardian_address: form.find('input[id="guardianAddress"]').val()
                    , guardian_email: form.find('input[id="guardianEmail"]').val()
                    , guardian_phone: form.find('input[id="guardianPhone"]').val()
                    , guardian_username: form.find('input[id="guardianUsername"]').val()
                    , guardian_password: form.find('input[id="guardianPassword"]').val()
                    , student_username: form.find('input[id="studentUsername"]').val()
                    , student_password: form.find('input[id="studentPassword"]').val()
                    , student_status: form.find('select[id="studentStatus"]').val()
                    , educational_system: $('option:checked', form.find('select[id="schoolSelect"]')).attr('educationalSystem')
                }).then(function () {
                    AppNotification.show(
                        'success', 'El registro ha sido creado correctamente', 'Registro creado'
                    );

                    Modal.close(modal.attr('id'));
                    // Reload table
                    StudentDatatable.getList().then(function () {
                        $('table[id="dataTable"]').DataTable().destroy;
                        $('div[id="dataList"]').html(arguments[0]);
                        initializeTable();
                    });
                });
            }


        });
    }

    // Loads a modal and update a record
    function updateForm(modal) {

        modal.find('[id="okModal"]').on('click', function () {
            let form = $("form[id='editForm']");

            // JS validations before submit
            if (!FormIsValid(form)) {
                AppNotification.show(
                    'warning', 'Hubo un error al intentar crear el registro. El registro no se ha creado.', 'Error'
                );
            }

            // All this data goes to the update function controller
            StudentDatatable.update({
                _token: Application.getToken()
                , id: form.find('input[name="academicYearId"]').val()
                , start_date: form.find('input[id="startDate"]').val()
                , end_date: form.find('input[id="endDate"]').val()
                , note: form.find('textarea[id="note"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido actualizado correctamente', 'Registro actualizado'
                );

                Modal.close(modal.attr('id'));

                // Reload table
                StudentDatatable.getList().then(function () {
                    $('table[id="dataTable"]').DataTable().destroy;

                    $('div[id="dataList"]').html(arguments[0]);

                    initializeTable();
                });
            });
        });
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
        // Create a new record into the database
        , save: function (data) {
            console.log(data)
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

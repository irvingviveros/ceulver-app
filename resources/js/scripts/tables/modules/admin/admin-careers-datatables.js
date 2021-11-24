const Career = (function () {
    'use strict';

    const urlController = Application.getUrl() + 'admin/manage-careers/';

    function initialize() {
        // TODO EVENTOS DE FILTROS DE LISTADO
        initializeTable();
    }

    // Get and initializes the datatable
    function initializeTable() {
        // JQuery selector for table
        let table =  $('#careerTable');

        // Apply icons on all table pages
        feather.replace();

        // Apply Datatable default configuration
        table.DataTable(
            Application.getDatatableConfiguration()
        )

    }

    // Initializes events from the datatable
    function initializeEvents() {

        let table =  $('#careerTable');

        // Create event
        $('.createCareer').on('click', function () {
            Career.getRegisterForm().then(function () {
                let modal = Modal.create({
                    id: 'careerRegisterForm'
                    , title: 'Crear Carrera'
                    , content: arguments[0]
                    , okButtonText: 'Crear'
                    , cancelButtonText: 'Cancelar'
                });

                modal.modal('show').on('shown.bs.modal', function () {
                    createCareerForm(modal)
                });
            });
        });

        // Update event
        $('.item-edit').on('click', function () {
            let careerId = $(this).attr('data-id');

            Career.getEditForm(
                careerId
            ).then(function () {
                let modal = Modal.create({
                    id: 'careerEditForm'
                    , title: 'Modificar carrera'
                    , content: arguments[0]
                    , okButtonText: 'Guardar'
                    , cancelButtonText: 'Cerrar'
                });

                modal.modal('show').on('shown.bs.modal', function () {
                    updateCareerForm(modal)
                });
            });
        });

        // Assign methods from DataTable object
        table = $('#careerTable').DataTable();

        // Delete event
        $('#careerTable tbody').on('click', '.delete-record',  function (event) {

            let careerId = $(event.currentTarget).attr('data-id');
            let row = $(this);

            // Show Swal component and delete
            Delete.run(Career, careerId, table, row);
        });
    }

    // Loads a modal and creates a new record
    function createCareerForm(modal) {

        $('input[id="openingDate"]').flatpickr();

        modal.find('[id="okModal"]').on('click', function () {
            let form = $("form[id='careerRegisterForm']");

            if (!form.valid()) {
                return;
            }

            Career.save({
                _token: Application.getToken()
                , name: form.find('input[id="careerName"]').val()
                , enrollment: form.find('input[id="careerEnrollment"]').val()
                , opening_date: form.find('input[id="openingDate"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido creado correctamente', 'Registro creado'
                );

                Modal.close(modal.attr('id'));

                // Reload table
                Career.getList().then(function () {
                    $('table[id="careerTable"]').DataTable().destroy;

                    $('div[id="careerList"]').html(arguments[0]);

                    initializeTable();
                    initializeEvents();
                });
            });
        });

        loadFormValidation();
    }

    // Loads a modal and update a record
    function updateCareerForm(modal) {

        $('input[id="openingDate"]').flatpickr();

        modal.find('[id="okModal"]').on('click', function () {
            let form = $("form[id='careerEditForm']");

            if (!form.valid()) {
                return;
            }

            Career.update({
                _token: Application.getToken()
                , id: form.find('input[id="careerId"]').val()
                , name: form.find('input[id="careerName"]').val()
                , enrollment: form.find('input[id="careerEnrollment"]').val()
                , opening_date: form.find('input[id="openingDate"]').val()
            }).then(function () {
                AppNotification.show(
                    'success', 'El registro ha sido actualizado correctamente', 'Registro actualizado'
                );

                Modal.close(modal.attr('id'));

                // Reload table
                Career.getList().then(function () {
                    $('table[id="careerTable"]').DataTable().destroy;

                    $('div[id="careerList"]').html(arguments[0]);
                    feather.replace();

                    initializeTable();
                    initializeEvents();
                });
            });
        });

        loadFormValidation();

    }

    // Load validations
    function loadFormValidation() {
        let careerRegisterForm = $("form[id='careerRegisterForm']");

        // Validate that the contents of a field are not spaces
        $.validator.addMethod("emptyField", function (value, element) {
            let valido = value.trim().length !== 0;

            return this.optional(element) || valido;
        });

        careerRegisterForm.validate({
            rules: {
                careerName: {
                    required: true
                    , emptyField: true
                }
                , careerEnrollment: {
                    required: true
                    , emptyField: true
                }
                , openingDate: {
                    required: true
                    , emptyField: true
                }
            }
            , messages: {
                careerName: {
                    required: "Requerido"
                    , emptyField: "Requerido"
                }
                , careerEnrollment: {
                    required: "Requerido"
                    , emptyField: "Requerido"
                }
                , openingDate: {
                    required: "Requerido"
                    , emptyField: "Requerido"
                }
            }
            , errorPlacement: function (error, element) {
                careerRegisterForm.find("span[for='" + element.attr('id') + "']").append(error);
            }
        });

        return careerRegisterForm;
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
                , method: 'PATCH'
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
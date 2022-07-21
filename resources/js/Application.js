const Application = (function(){
    const site = window.location.origin + '/';
    return {
        getUrl: function() {
            return site;
        }
        , getToken: function() {
            return $('meta[name="csrf-token"]').attr('content');
        }
        , getDatatableConfiguration(DataTableObject) {
            return {
                columnDefs: [
                    {
                        // For Responsive
                        className: 'control'
                        , responsivePriority: 2
                        , targets: 0
                        , visible: false
                    }
                    , {
                        // For Checkboxes
                        targets: 1
                        , orderable: false
                        , responsivePriority: 3
                        , render: function (data, type, full, meta) {
                            return (
                                '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
                                data +
                                '" /><label class="form-check-label" for="checkbox' +
                                data +
                                '"></label></div>'
                            );
                        }
                        , checkboxes: {
                            selectAllRender:
                                '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
                        }
                    }
                ]
                , dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
                , buttons: [
                    {
                        extend: 'collection'
                        , className: 'btn btn-outline-secondary dropdown-toggle me-2'
                        , text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Exportar'
                        , buttons: [
                            {
                                extend: 'print'
                                ,  text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Imprimir'
                                , className: 'dropdown-item'
                                , exportOptions: { columns: [2, 3, 4, 5, 6] }
                            }
                            , {
                                extend: 'csv'
                                , text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'CSV'
                                , className: 'dropdown-item'
                                , exportOptions: { columns: [2, 3, 4, 5, 6] }
                            }
                            , {
                                extend: 'excel'
                                , text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel'
                                , className: 'dropdown-item'
                                , exportOptions: { columns: [2, 3, 4, 5, 6] }
                            }
                            , {
                                extend: 'pdf'
                                , text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'PDF'
                                , className: 'dropdown-item'
                                , exportOptions: { columns: [2, 3, 4, 5, 6] }
                            }
                            , {
                                extend: 'copy'
                                , text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copiar'
                                , className: 'dropdown-item'
                                , exportOptions: { columns: [2, 3, 4, 5, 6] }
                            }
                        ]
                        , init: function (api, node, config) {
                            $(node).removeClass('btn-secondary');
                            $(node).parent().removeClass('btn-group');

                            setTimeout(function () {
                                $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                            }, 50);
                        }
                    }
                    , {
                        name: 'create'
                        , text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Crear nuevo registro'
                        , className: 'btn btn-primary createEntry'
                        , init: function (api, node, config) {
                            $(node).removeClass('btn-secondary');
                        }
                    }
                ]
                , displayLength: 10
                , lengthMenu: [10, 25, 50, 75, 100]
                , language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
                , initComplete: function(settings, json) {
                    console.log('DataTables has finished its initialisation.');
                    DataTableObject.loadEvents();
                    console.log('Eventos cargados del datatable')
                }
            }
        }
    }
})();
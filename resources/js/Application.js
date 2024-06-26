const Application = (function () {
    const site = window.location.href + '/';
    return {
        getUrl: function () {
            return site;
        },
        getToken: function () {
            return $('meta[name="csrf-token"]').attr('content');
        },
        getDatatableConfiguration(DataTableEvents, DataTableConfig) {
            return {
                processing: true,
                serverSide: true,
                ajax: DataTableConfig.ajax,
                order: DataTableConfig.order,
                columnDefs: [
                    {
                        targets: -1, // 'Actions' column (last column is always "-1").
                        orderable: false,
                    },
                    {
                        targets: 0, // For checkboxes
                        orderable: false,
                        render: function (data, type, full, meta) {
                            return (
                                '<div class="form-check"><input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
                                data +
                                '" /><label class="form-check-label" for="checkbox' +
                                data +
                                '"></label</div>'
                            );
                        },
                        checkboxes: {
                            selectAllRender: '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
                        }
                    }
                ],
                columns: DataTableConfig.columns,
                dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                buttons: [
                    {
                        extend: 'colvis',
                        className: 'btn btn-outline-secondary dropdown-toggle me-2',
                        text: feather.icons['eye'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Visibilidad',
                        columns: ':not(.noVis)'
                    },
                    {
                        extend: 'collection',
                        className: 'btn btn-outline-secondary dropdown-toggle me-2',
                        text: feather.icons['share'].toSvg({
                            class: 'font-small-4 me-50'
                        }) + 'Exportar',
                        buttons: [
                            {
                                extend: 'print',
                                text: feather.icons['printer'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) + 'Imprimir',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':visible:not(.noVis)'
                                }
                            },
                            {
                                extend: 'csv',
                                text: feather.icons['file-text'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) + 'CSV',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':visible:not(.noVis)'
                                }
                            },
                            {
                                extend: 'excel',
                                text: feather.icons['file'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) + 'Excel',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':visible:not(.noVis)'
                                }
                            },
                            {
                                extend: 'pdf',
                                text: feather.icons['clipboard'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) + 'PDF',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':visible:not(.noVis)'
                                },
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                            }, {
                                extend: 'copy',
                                text: feather.icons['copy'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) + 'Copiar',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':visible:not(.noVis)'
                                }
                            }
                        ],
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary');
                            $(node).parent().removeClass('btn-group');

                            setTimeout(function () {
                                $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                            }, 50);
                        }
                    },
                    {
                        name: 'import',
                        text: feather.icons['package'].toSvg({
                            class: 'me-50 font-small-4 mr-5'
                        }) + 'Carga masiva',
                        className: 'btn btn-outline-secondary me-2 bulk-upload',
                        action: () => {
                            window.location = site + 'bulk-upload';
                        }
                    },
                    {
                        name: 'create',
                        text: feather.icons['plus'].toSvg({
                            class: 'me-50 font-small-4'
                        }) + 'Crear nuevo registro',
                        className: 'btn btn-primary createEntry',
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary');
                        }
                    }
                ],
                displayLength: 10,
                lengthMenu: [10, 25, 50, 75, 100],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json',
                    processing: '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
                    searchPlaceholder: 'Búsqueda rápida'
                },
                select: true,
                fixedHeader: true,
                initComplete: function (settings, json) {
                    DataTableEvents.loadEvents();
                },
                drawCallback: function () {
                    $(document).find('[data-bs-toggle="tooltip"]').tooltip();
                }
            }
        }
    }
})();

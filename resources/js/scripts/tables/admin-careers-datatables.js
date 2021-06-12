/**
 * DataTables Basic
 */

$(function () {
    'use strict';

    // CSRF Security Token for POST form
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    var dt_basic_table = $('.datatables-basic'),
        dt_date_table = $('.dt-date'),
        assetPath = '../../../app-assets/';

    if ($('body').attr('data-framework') === 'laravel') {
        assetPath = $('body').attr('data-asset-path');
    }

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
        var dt_basic = dt_basic_table.DataTable({
            // Data
            serverSide: true,
            ajax: ({
                url: window.location.origin + '/api/careers',
                type: 'GET',
            }),
            // Order by ID, first column
            order: [[0, 'desc']],
            columns: [
                { data: 'id' }, // 0
                { data: 'id' }, // 1
                { data: 'name' }, // 2
                { data: 'enrollment' }, // 3
                { data: 'opening_date'}, // -3
                { data: 'status' }, // -2
                { data: '' }, // -1
            ],
            columnDefs: [
                {
                    // For Responsive
                    className: 'control',
                    responsivePriority: 2,
                    targets: 0,
                    visible: false
                },
                {
                    // For Checkboxes
                    targets: 1,
                    orderable: false,
                    responsivePriority: 3,
                    render: function (data, type, full, meta) {
                        return (
                            '<div class="custom-control custom-checkbox"> <input class="custom-control-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
                            data +
                            '" /><label class="custom-control-label" for="checkbox' +
                            data +
                            '"></label></div>'
                        );
                    },
                    checkboxes: {
                        selectAllRender:
                            '<div class="custom-control custom-checkbox"> <input class="custom-control-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="custom-control-label" for="checkboxSelectAll"></label></div>'
                    }
                },
                {
                    // Label for email_settings
                    responsivePriority: 1,
                    targets: 4,
                },
                {
                    // Label for status
                    targets: -2,
                    render: function (data, type, full, meta) {
                        var $status_number = full['status'];
                        var $status = {
                            0: { title: 'Inactivo', class: ' badge-light-warning ' },
                            1: { title: 'Activo', class: ' badge-light-success' },
                        };
                        if (typeof $status[$status_number] === 'undefined') {
                            return data;
                        }
                        return (
                            '<span class="badge badge-pill ' +
                            $status[$status_number].class +
                            '">' +
                            $status[$status_number].title +
                            '</span>'
                        );
                    }
                },
                {
                    // Actions
                    targets: -1,
                    title: 'Acciones',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        const $career_id = full['id'];
                        return (
                            '<div class="d-inline-flex">' +
                            '<a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown">' +
                            feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-right">' +
                            '<a href="javascript:;" class="dropdown-item">' +
                            feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) +
                            'Detalles</a>' +
                            '<a href="javascript:void(0)"' + ' data-id="' + $career_id + '"' + ' class="dropdown-item delete-record">' +
                            feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
                            'Eliminar</a>' +
                            '</div>' +
                            '</div>' +
                            '<a href="/admin/manage-careers/' + $career_id + '/edit"' + ' class="item-edit">' +
                            feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
                            '</a>'
                        );
                    }
                }
            ],
            dom:
                '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 7,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2',
                    text: feather.icons['share'].toSvg({ class: 'font-small-4 mr-50' }) + 'Exportar',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({ class: 'font-small-4 mr-50' }) + 'Imprimir',
                            className: 'dropdown-item',
                            exportOptions: { columns: [2, 3, 4, 5, 6] }
                        },
                        {
                            extend: 'csv',
                            text: feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) + 'CSV',
                            className: 'dropdown-item',
                            exportOptions: { columns: [2, 3, 4, 5, 6]  }
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({ class: 'font-small-4 mr-50' }) + 'Excel',
                            className: 'dropdown-item',
                            exportOptions: { columns: [2, 3, 4, 5, 6]  }
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 mr-50' }) + 'PDF',
                            className: 'dropdown-item',
                            exportOptions: { columns: [2, 3, 4, 5, 6]  }
                        },
                        {
                            extend: 'copy',
                            text: feather.icons['copy'].toSvg({ class: 'font-small-4 mr-50' }) + 'Copiar',
                            className: 'dropdown-item',
                            exportOptions: { columns: [2, 3, 4, 5, 6]  }
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
                    text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + 'Crear nuevo registro',
                    className: 'create-new btn btn-primary',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-slide-in'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }
            ],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Detalles de ' + data['name'];
                        }
                    }),
                    type: 'column',
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            console.log(columns);
                            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                ? '<tr data-dt-row="' +
                                col.rowIndex +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                '<td>' +
                                col.title +
                                ':' +
                                '</td> ' +
                                '<td>' +
                                col.data +
                                '</td>' +
                                '</tr>'
                                : '';
                        }).join('');

                        return data ? $('<table class="table"/>').append(data) : false;
                    }
                }
            },
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
            }
        });
        $('div.head-label').html('<h6 class="mb-0">Configuración carreras</h6>');
    }

    // Flat Date picker
    if (dt_date_table.length) {
        dt_date_table.flatpickr({
            monthSelectorType: 'static',
            dateFormat: 'm/d/Y'
        });
    }

    // Add New record
    // ? Remove/Update this code as per your requirements ?
    $('.data-submit').on('click', function () {
        const $career_name = $('.add-new-record .dt-career-name').val(),
            $career_enrollment = $('.add-new-record .dt-career-enrollment').val(),
            $opening_date = $('.add-new-record .dt-opening-date').val()

        if ($career_name !== '' && $career_enrollment !== '' && $opening_date) {
            $.ajax({
                url: 'manage-careers',
                type: 'post',
                data: {
                    _token: CSRF_TOKEN,
                    name: $career_name,
                    enrollment: $career_enrollment,
                    opening_date: $opening_date,
                },
                success: function (response) {
                    if (response > 0){
                        $('.modal').modal('hide');

                    } else if(response === 0){
                        alert('School already in DB.');
                    }else{
                        alert(response);
                    }
                    // Empty the input fields
                    $('#basic-icon-default-careerName').val('');
                    $('#basic-icon-default-enrollment').val('');
                    $('#school-registration').val('');
                    dt_basic.draw();
                }
            });
        }
    });

    // Delete Record
    $('.datatables-basic tbody').on('click', '.delete-record', function (event) {
        let id  = $(event.currentTarget).attr('data-id');
        let _url = window.location.origin + `/admin/email-settings/${id}`;

        $.ajax({
            url: _url,
            type: 'post',
            data: {_method: 'delete', _token: CSRF_TOKEN},
            success: function (response) {
                dt_basic.row($(this).parents('tr')).remove().draw();
            }
        });
    });

});

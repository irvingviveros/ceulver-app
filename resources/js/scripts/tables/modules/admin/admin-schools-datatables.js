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
        url: window.location.origin + '/api/schools',
        type: 'GET',
      }),
      // Order by ID, first column
      order: [[0, 'desc']],
      columns: [
        { data: 'id' },
        { data: 'id' },
        { data: 'school_name' },
        { data: 'address' },
        { data: 'email' },
        { data: 'enable_online_admission' },
        { data: 'status' },
        { data: '' },
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
              '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' +
              data +
              '" /><label class="form-check-label" for="checkbox' +
              data +
              '"></label></div>'
            );
          },
          checkboxes: {
            selectAllRender:
            '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
          }
        },
        {
          targets: 2,
        },
        {
          // Label for email
          responsivePriority: 1,
          targets: 4,
        },
        {
          // Label for online admissions
          targets: -3,
          render: function (data, type, full, meta) {
            var $status_number = full['enable_online_admission'];
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
          // Label for estatus
          targets: -2,
          render: function (data, type, full, meta) {
            var $status_number = full['status'];
            var $status = {
              0: { title: 'Inactivo', class: ' badge-light-warning' },
              1: { title: 'Activo', class: ' badge-light-success' },
            };
            if (typeof $status[$status_number] === 'undefined') {
              return data;
            }
            return (
              '<span class="badge rounded-pill ' +
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
            const $school_id = full['id'];
            return (
              '<div class="d-inline-flex">' +
              '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-end">' +
              '<a href="javascript:;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showSchoolDetails">' +
              feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) +
              'Detalles</a>' +
              '<a href="javascript:;"' + ' data-id="' + $school_id + '"' + ' class="dropdown-item delete-record">' +
              feather.icons['trash-2'].toSvg({ class: 'font-small-4 me-50' }) +
              'Eliminar</a>' +
              '</div>' +
              '</div>' +
              '<a href="/admin/manage-schools/' + $school_id + '/edit"' + ' class="item-edit">' +
              feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
              '</a>'
            );
          }
        }
      ],
      dom:
        '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-outline-secondary dropdown-toggle me-2',
          text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Exportar',
          buttons: [
            {
              extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Imprimir',
              className: 'dropdown-item',
              exportOptions: { columns: [2, 3, 4, 5, 6] }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'CSV',
              className: 'dropdown-item',
              exportOptions: { columns: [2, 3, 4, 5, 6]  }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [2, 3, 4, 5, 6]  }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'PDF',
              className: 'dropdown-item',
              exportOptions: { columns: [2, 3, 4, 5, 6]  }
            },
            {
              extend: 'copy',
              text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copiar',
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
          text: feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) + 'Crear nuevo registro',
          className: 'create-new btn btn-primary',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#modals-slide-in'
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
              return 'Detalles de ' + data['school_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                  ? '<tr data-dt-row="' +
                  col.rowIdx +
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

            return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
          }
        }
      },
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
      }
    });
    $('div.head-label').html('<h6 class="mb-0">Administrar escuelas</h6>');
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
    const $school_name = $('.add-new-record .dt-school-name').val(),
        $school_address = $('.add-new-record .dt-address').val(),
        $school_email = $('.add-new-record .dt-email').val(),
        $school_admission = $('.add-new-record .dt-admission').val();

    if ($school_name !== '' && $school_address !== '' && $school_email !== '' && $school_admission !== '') {
      $.ajax({
        url: 'manage-schools',
        type: 'POST',
        data: {
          _token: CSRF_TOKEN,
          _method: 'POST',
          school_name: $school_name,
          school_address: $school_address,
          school_email: $school_email,
          school_admission: $school_admission
        },
        success: function (response) {
          if (response > 0){
            $('.modal').modal('hide');
            //Toster popup
            toastr['success']('El registro ha sido creado correctamente', 'Registro creado', {
              closeButton: true,
              tapToDismiss: false,
              progressBar: true,
            });
          } else if(response == 0){
            toastr['warning']('La institución ya se encontraba registrada', {
              closeButton: true,
              tapToDismiss: false,
            });
          }else{
            alert(response);
          }
          // Empty the input fields
          $('#basic-icon-default-fullname').val('');
          $('#basic-icon-default-post').val('');
          $('#basic-icon-default-email').val('');
          $('#selectOnlineAdmission').val('0');

          dt_basic.draw();
        }
      });

    }
  });

  // Delete Record
  $('.datatables-basic tbody').on('click', '.delete-record', function (event) {

    let id  = $(event.currentTarget).attr('data-id');
    let _url = window.location.origin + `/admin/manage-schools/${id}`;

    Swal.fire({
      title: 'Confirme la eliminación',
      text: "No se podrá revertir el cambio",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, eliminar',
      cancelButtonText: "Cancelar",
      customClass: {
        confirmButton: 'btn btn-primary',
        cancelButton: 'btn btn-outline-danger ms-1'
      },
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {

        $.ajax({
          url: _url,
          type: 'post',
          data: {_method: 'delete', _token: CSRF_TOKEN},
          success: function (response) {
            dt_basic.row($(this).parents('tr')).remove().draw();
          }
        });
        // Toaster popup
        toastr['success']('El registro ha sido eliminado correctamente', 'Registro eliminado', {
          closeButton: true,
          tapToDismiss: false,
          progressBar: true,
        });
      }
    })
  });

});






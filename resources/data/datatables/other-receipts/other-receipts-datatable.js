// Basic student columns. NO university columns are in this array.
let basicColumns = [
    // columns according to JSON
    {data: "id"},
    {data: "id"},
    {data: "payment_method"},
    {data: "payment_concept"},
    {
        data: "amount",
        render: function (data, type, row) {
            return '$' + data
        }
    },
    {data: "payment_date"},
    {data: "educational_level", name: "educational_systems.name"},
    {
        data: "deleted_at",
        render: function (data, type, full, meta) {
            var $status = {
                1: {title: 'Pagado', class: ' badge-light-success'},
                0: {title: 'Cancelado', class: 'badge-light-danger'},
            };
            if ((data === 'Pagado')) {
                return (
                    '<span class="badge rounded-pill ' +
                    $status[1].class +
                    '">' +
                    $status[1].title +
                    '</span>'
                )
            }
            return (
                '<span class="badge rounded-pill ' +
                $status[0].class +
                '">' +
                $status[0].title +
                '</span>'
            )
        },
    },
    {
        // Actions
        render: function (data, type, row) {
            return (
                '<div class="d-flex align-items-center col-actions">' +
                '<a class="me-1" href="#" data-id="' + row['id'] + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Enviar por correo">' +
                feather.icons['send'].toSvg({class: 'font-medium-2 text-body'}) +
                '</a>' +
                '<a class="item-show" href="javascript:void(0)" data-id="' + row['id'] + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Visualizar">' +
                feather.icons['eye'].toSvg({class: 'font-medium-2 text-body me-50'}) +
                '</a>' +
                '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                feather.icons['more-vertical'].toSvg({class: 'font-medium-2 text-body'}) +
                '</a>' +
                '<div class="dropdown-menu dropdown-menu-end">' +
                '<a href="javascript:void(0)" class="dropdown-item item-edit" data-id="' + row['id'] + '">' +
                feather.icons['download'].toSvg({class: 'font-small-4 me-50'}) +
                'Descargar</a>' +
                '<a href="javascript:void(0)" class="dropdown-item item-edit" data-id="' + row['id'] + '">' +
                feather.icons['edit'].toSvg({class: 'font-small-4 me-50'}) +
                'Editar</a>'
                +
                '<div class="dropdown-divider"></div>'
                +
                '<a href="javascript:void(0)" class="dropdown-item delete-record text-danger" data-id="' + row['id'] + '">' +
                feather.icons['slash'].toSvg({class: 'font-small-4 me-50'}) +
                'Cancelar</a>' +
                '</div>' +
                '</div>'
            );
        }
    }
]

const OtherReceiptsDatatable = (companyId) => {
    return {
        ajax: '/api/companies/' + companyId + /other-receipts/,
        order: [[1, 'desc']],
        columns: basicColumns
    }
}

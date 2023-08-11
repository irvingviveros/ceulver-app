// Basic student columns.
let basicColumns = [
    // columns according to JSON
    {data: "id"},
    {data: "id"},
    {data: "student_name"},
    {data: "national_id"},
    {data: "payment_reference"},
    {data: "educational_system"},
    {
        data: "enrollment",
        render: function (data, type, row) {
            return data == null ? 'N/A' : data;
        }
    },
    {
        data: "career_name",
        render: function (data, type, row) {
            return data == null ? 'N/A' : data;
        }
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
                '<a href="javascript:void(0)" class="dropdown-item item-printed-registration-form" data-id="' + row['id'] + '">' +
                feather.icons['download'].toSvg({class: 'font-small-4 me-50'}) +
                'Descargar Ficha Inscripción</a>' +
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

const StudentsDatatable = (companyId) => {
    return {
        ajax: '/api/companies/' + companyId + /students/,
        order: [[1, 'desc']],
        columns: basicColumns
    }
}

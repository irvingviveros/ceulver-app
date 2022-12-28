// Basic student columns. NO university columns are in this array.
let basicColumns = [
    // columns according to JSON
    {data: "id"},
    {data: "sheet"},
    {data: "reference"},
    {data: "payment_method"},
    {data: "payment_concept"},
    {
        data: "amount",
        render: function (data, type, row) {
            return '$' + data
        }
    },
    {data: "payment_date"},
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

const StudentReceiptsDatatable = (educationalSystemName) => {

    // If param is University, then add university columns to the array
    isUniversityRequest(educationalSystemName) === true ? addUniversityColumns() : false
    // Return data
    return {
        ajax: '/api/students/receipts/' + educationalSystemName,
        order: [[1, 'desc']],
        columns: basicColumns
    }
}
function isUniversityRequest(educationalSystemName) {
    return 'Universidad' === educationalSystemName
}

function addUniversityColumns() {
    // Add columns before the last item on the list.
    basicColumns.splice(-1, 0,
        {data: "enrollment", name: "students.enrollment"}
    )
}

/*=========================================================================================
    File Name: students-ajax.js
    Description: Select2 is a jQuery-based replacement for select boxes.
    It supports searching, remote data sets, and pagination of results.
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(document).ready(function () {
    let selectAjax = $('.select2-data-ajax');

    // Get school code to pass into the api url
    let schoolCode = $('#school-code').val() ?? null;
    // Get company id to pass into the api URL
    let companyId = $('#company-id').val() ?? null;
    // Assign other receipt div
    let otherReceipt = $('#other-receipt');

    'use strict';
    $.fn.select2.defaults.set('language', 'es');

// Loading remote data
    selectAjax.wrap('<div class="position-relative"></div>').select2({
        dropdownParent: selectAjax.parent(),
        placeholder: "Seleccione un alumno",
        minimumInputLength: 1, // only start searching when the user has input 3 or more characters
        language: "es",
        ajax: {
            url: function (data, params) {
                console.log(otherReceipt)
                if (otherReceipt.val() == null) {
                    console.log('search by school code')
                    return '/api/school/' + schoolCode + '/students/search'
                } else {
                    console.log('search by company id')
                    return '/api/companies/' + companyId + '/students/search'
                }
            },
            dataType: 'json',
            // The number of milliseconds to wait for the user to stop typing before
            // issuing the ajax request.
            delay: 1000,
            data: function (params) {
                return {
                    name: params.term // 'name' means 'student name'. Also is a required parameter for the api request
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.data,
                    pagination: {
                        more: (params.page * 10) < data.recordsFiltered,
                    }
                };
            },
        },
    });

// Display additional student information on select
    selectAjax.on('select2:select', function (e) {

        // Initialize data
        let data = e.params.data;
        // Check if data is empty/null
        populateNullData(data);
        // Set student data to div's
        assignValues(data);

        // If child div for additional info exist, then remove it.
        if ($("#nd-info")) {
            $("#nd-info").remove();
        }

        let div = "<div id='nd-info'><h6 class='mb-2'><b>INFORMACIÓN ADICIONAL</b></h6>" +
            "<table>" +
            "<tbody>" +
            "<tr><td class='pe-1'>Referencia pago:</td><td>" + data.payment_reference + "</td></tr>" +
            "<tr><td class='pe-1'>Matrícula:</td><td>" + data.enrollment + "</td></tr>" +
            "<tr><td class='pe-1'>Carrera:</td><td>" + data.career_name + "</td></tr>" +
            "</tbody>" +
            "</table></div>";

        //TODO: test with other student info, example bachelor
        if (data.enrollment !== null && data.career_name !== null) {
            $("#additional-info").append(div);
        }
    });

    function populateNullData(data) {
        data.payment_reference === null ? data.payment_reference = "SIN INFORMACIÓN" : data.payment_reference;
    }
});

function assignValues(data) {
    // Declare local variables
    let studentIDSelector = $('#student-id');
    let studentReferenceSelector = $('#student-reference');

    // Assign student id value to selector
    studentIDSelector.val(data.id);
    // Assign payment reference value to selector
    studentReferenceSelector.val(data.payment_reference);
}

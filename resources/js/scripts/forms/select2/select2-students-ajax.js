/*=========================================================================================
    File Name: students-ajax.js
    Description: Select2 is a jQuery-based replacement for select boxes.
    It supports searching, remote data sets, and pagination of results.
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
    'use strict';
    $.fn.select2.defaults.set('language', 'es');

    var selectAjax = $('.select2-data-ajax');

// Loading remote data
selectAjax.wrap('<div class="position-relative"></div>').select2({
    dropdownParent: selectAjax.parent(),
    placeholder: "Seleccione un alumno",
    minimumInputLength: 1, // only start searching when the user has input 3 or more characters
    language: "es",
    ajax: {
        url: '/api/school/sc06/student/search',
        dataType: 'json',
        // The number of milliseconds to wait for the user to stop typing before
        // issuing the ajax request.
        delay: 1000,
        data: function (params) {
            return {
                name: params.term
            };
        },
        processResults: function (data, params) {
            params.page = params.page || 1;
            console.log(data.recordsFiltered)
            return {
                results: data.data,
                pagination: {
                    more: (params.page * 10) < data.recordsFiltered,
                }
            };
        },
    },
});
    selectAjax.on('select2:select', function (e) {
        var data = e.params.data;
        console.log(data);
    });
})(window, document, jQuery);

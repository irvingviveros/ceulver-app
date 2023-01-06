/*=========================================================================================
    File Name: customPickr.js
    Description: Pick a date/time Picker, Date Range Picker JS
    ----------------------------------------------------------------------------------------
    Item Name:
    Author:
    Author URL:
==========================================================================================*/
(function (window, document, $) {
    'use strict';

    var basicPickr = $('.flatpickr-basic');

    // Check if the current wrapper is an edit form or not
    if (!isEditForm()) {
        // If it is not an edit form ID, then set default today's date
        setTodayDate(basicPickr)
    }

    if (basicPickr.length) {
        basicPickr.flatpickr({
            static: false,
            allowInput: true,
            altInput: true,
            enableTime: true,
            altFormat: 'j F, Y',
            dateFormat: 'Y-m-d H:i',
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                },
                months: {
                    shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                    longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                }
            },
        });
    }

})(window, document, jQuery);

// Search for a div edit form id and then if exists, return true
function isEditForm() {
    if ($('#editForm').length) return true;
}

function setTodayDate(customPickr) {
    return customPickr.flatpickr({
        defaultDate: new Date()
    })
}

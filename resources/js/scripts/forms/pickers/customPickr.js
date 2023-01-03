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

    if (basicPickr.length) {
        basicPickr.flatpickr({
            static: false,
            allowInput: true,
            altInput: true,
            altFormat: 'j F, Y',
            dateFormat: 'd-m-Y',
            defaultDate: new Date(),
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

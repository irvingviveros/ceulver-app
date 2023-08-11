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

    // Selecciona todos los elementos con la clase 'flatpickr-basic'
    var basicPickr = $('.flatpickr-basic');

    // Obtiene la fecha actual
    var today = new Date();

    if (basicPickr.length) {
        // Verifica si el formulario actual es un formulario de edición
        if (!isEditForm()) {
            // Si no es un formulario de edición, inicializa el date picker con la fecha actual
            initializeDatePickr(basicPickr, today);
        } else {
            // Si es un formulario de edición, itera sobre cada elemento y establece la fecha basada en su valor
            basicPickr.each(function() {
                $(this).flatpickr('setDate', $(this).val());
                initializeDatePickr(basicPickr);
            });
        }
    }

})(window, document, jQuery);

// Comprueba si existe un formulario de edición con el ID 'editForm'
function isEditForm() {
    return $('#editForm').length > 0;
}

// Inicializa el date picker con opciones específicas
function initializeDatePickr(datePickr, date) {
    datePickr.flatpickr({
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
        defaultDate: date
    });
}

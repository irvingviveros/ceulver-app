/*=========================================================================================
    File Name: student-username-generator.js
    Description: Generate a temporal username. This file is for testing purposes.
    ----------------------------------------------------------------------------------------
    Item Name: student-username-generator
    Author: Irving Viveros
    Author URL: https://github.com/irvingviveros
==========================================================================================*/
$('#nationalId').blur(function() {
    let nationalId = $('#nationalId').val()
    let currentYear = new Date().getFullYear();
    let currentMonth = new Date().getMonth();

    // Check if the national id is less than 5 characters. If this is the case, it clears the username field.
    if (nationalId.length < 5) {
        $('#studentUsername').val('')
        $('#guardianUsername').val('')
    }

    // If the national id field has more than 5 characters, then generate the username
    if (nationalId.length >= 5) {
        let username = nationalId.slice(0,5); // Slice the national id and saves the first 5 characters

        $("#schoolSelect").change(function (){
            let selector = $('div[dynamic-toggle]');
            let option = $('option:checked', this).attr('educationalSystem')
            option === $('div[data-system]').data('system') ? selector.removeClass("d-none") : selector.addClass("d-none")

            // If value from select equals 'Universidad', hide divs with class 'hide-toggle'
            if (option === 'Universidad') {
                $('#studentUsername').val(username + currentYear + currentMonth);
                $('#guardianUsername').val('')
                console.log('Usuario del padre eliminado ' + $('#guardianUsername').val(''))
            } else {
                $('#guardianUsername').val(username + currentYear + currentMonth);
                $('#studentUsername').val('')
                console.log('Usuario del alumno eliminado ' + $('#studentUsername').val(''))
            }

        })
    }
});

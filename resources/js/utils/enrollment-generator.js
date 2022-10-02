/*=========================================================================================
    File Name: enrollment-generator.js
    Description: Generate an enrollment for the university student from career selector and
    the current running year.
    ----------------------------------------------------------------------------------------
    Item Name: enrollment-generator
    Author: Irving Viveros
    Author URL: https://github.com/irvingviveros
==========================================================================================*/
$('#careerSelect').on('change', function() {
    // Get selected career
    let careerEnrollment = $("#careerSelect option:checked").attr('enrollment')
    // Get current year
    let currentYear = new Date().getFullYear()

    $('#enrollment').val(careerEnrollment + currentYear)
});

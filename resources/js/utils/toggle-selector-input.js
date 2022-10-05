/*=========================================================================================
    File Name: toggle-selector-input.js
    Description: Show the input field input if the value is selected
    ----------------------------------------------------------------------------------------
    Item Name: toUpperCase
    Author: Irving Viveros
    Author URL: https://github.com/irvingviveros
==========================================================================================*/
$(function() {
    $("#schoolSelect").change(function (){
        let selector = $('div[dynamic-toggle]');
        let option = $('option:checked', this).attr('educationalSystem')
        option === $('div[data-system]').data('system') ? selector.removeClass("d-none") : selector.addClass("d-none")

        // If value from select equals 'Universidad', hide divs with class 'hide-toggle'
        if (option === 'Universidad') {
            $('div.hide-toggle').addClass("d-none")
        } else $('div.hide-toggle').removeClass("d-none")
    })
})
